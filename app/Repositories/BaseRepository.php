<?php

namespace App\Repositories;
use App\Helpers\ResponseHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BaseRepository
{
    /**
     * Create a new class instance.
     */
    protected $model;
    protected array $mediaColumns;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->mediaColumns = config('media_columns.media_columns', []);
    
    }
    public function translatedAttributes(): array
    {
        if (property_exists($this->model, 'translatedAttributes')) {
            if (!empty($this->model->translatedAttributes)) {
                return ResponseHelper::format(200, true, 'success', $this->model->translatedAttributes);
            } else {
                return ResponseHelper::format(500, false, 'translatedAttributes property must have at least one value');
            }
        }
        return ResponseHelper::format(200, true, '', []);
    }

    public function translationHandler(array $data): array
    {
        $langs = config('translatable.locales', []);
        $results = [];
        $translatedAttributesResponse = $this->translatedAttributes();
        
        if ($translatedAttributesResponse['status']) {
            $translatedAttributes = $translatedAttributesResponse['data'];
            foreach ($langs as $lang) {
                foreach ($translatedAttributes as $item) {
                    $results[$lang][$item] = $data["{$item}_{$lang}"] ?? null;
                }
            }
            return ResponseHelper::format(200, true, 'success', $results);
        }
        return $translatedAttributesResponse;
    }

    public function dataHandler(array $data): array
    {
        $results = [];
        if (property_exists($this->model, 'columns')) {
            foreach ($this->model->columns as $column) {
                if (!in_array($column, $this->mediaColumns)) {
                    $results[$column] = $data[$column] ?? null;
                }
            }

            if (property_exists($this->model, 'translatedAttributes')) {
                $translationResult = $this->translationHandler($data);
                if ($translationResult['status']) {
                    $results = array_merge($results, $translationResult['data']);
                }
            }
            return ResponseHelper::format(200, true, 'success', $results);
        }
        return ResponseHelper::format(500, false, 'columns property is required');
    }

    public function all(): array
    {
        DB::beginTransaction();
        try {
            $response = ResponseHelper::format(200, true, 'Success', $this->model->all());
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = ResponseHelper::format(500, false, $th->getMessage());
        }
        return $response;
    }

    public function create(array $data): array
    {
        $data = request()->replace($data)->all();
        $response = $this->dataHandler($data);

        if ($response['success']) {
            DB::beginTransaction();
            try {
                $category = $this->model->create($response['data']);
                DB::commit();
                $response = ResponseHelper::format(200, true, 'Success', $category);
            } catch (\Throwable $th) {
                DB::rollBack();
                $response = ResponseHelper::format(500, false, $th->getMessage());
            }
        }
        return $response;
    }

    public function update(array $data, int $id): array
    {
        $data = request()->replace($data)->all();
        $response = $this->dataHandler($data);

        if ($response['success']) {
            DB::beginTransaction();
            try {
                $category = $this->model->find($id);
                if ($category !== null) {
                    $category->update($response['data']);
                    DB::commit();
                    $response = ResponseHelper::format(200, true, 'Success');
                } else {
                    DB::rollBack();
                    $response = ResponseHelper::format(404, false, __('lang.not_found_record'));
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                $response = ResponseHelper::format(500, false, $th->getMessage());
            }
        }
        return $response;
    }

    public function delete(int $id): array
    {
        DB::beginTransaction();
        try {
            $category = $this->model->find($id);
            if ($category !== null) {
                $category->delete();
                DB::commit();
                $response = ResponseHelper::format(200, true, 'Success');
            } else {
                DB::rollBack();
                $response = ResponseHelper::format(404, true, __('lang.not_found_record'));
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = ResponseHelper::format(500, false, $th->getMessage());
        }
        return $response;
    }

    public function getPaginated($request, int $count = 10): array
    {
        $searchTerm = $request->input('q', '');

        DB::beginTransaction();
        try {
            $query = $this->model->newQuery();

            // Handle relationships to load
            if (!empty($this->model->indexWith)) {
                $query->with($this->model->indexWith);
            }
            if (!empty($this->model->indexWithCount)) {
                $query->withCount($this->model->indexWithCount);
            }

            // Apply search filters if searchable columns exist
            if (property_exists($this->model, 'searchable') && !empty($this->model->searchable)) {
                $this->applySearchFilters($query, $searchTerm);
            }

            $data = $query->distinct()
                ->orderBy('id', 'DESC')
                ->paginate($count);

            $response = ResponseHelper::format(200, true, 'Success', $data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = ResponseHelper::format(500, false, $th->getMessage());
        }

        return $response;
    }

    /**
     * Apply search filters to the query based on the search term and searchable columns.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $searchTerm
     * @return void
     */
    protected function applySearchFilters($query, string $searchTerm): void
    {
        $modelName = strtolower(class_basename($this->model));
        $modelNamePlural = Str::plural($modelName);

        $query->where(function ($subQuery) use ($searchTerm, $modelName, $modelNamePlural) {
            foreach ($this->model->searchable as $column) {
                if (in_array($column, $this->model->translatedAttributes ?? [])) {
                    $subQuery->orWhere("{$modelName}_translations.{$column}", 'LIKE', "%{$searchTerm}%");
                } else {
                    $subQuery->orWhere("{$modelNamePlural}.{$column}", 'LIKE', "%{$searchTerm}%");
                }
            }
        });

        if (!empty($this->model->translatedAttributes)) {
            $query->join("{$modelName}_translations", "{$modelNamePlural}.id", '=', "{$modelName}_translations.{$modelName}_id")
                ->where("{$modelName}_translations.locale", '=', app()->getLocale());
        }
    }
    public function translateFields(): array
    {
        return $this->model->my_translatedAttributes ?? [];
    }

    public function columnsFields(): array
    {
        return $this->model->my_columns ?? [];
    }
}
