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
    public $model;
    public $mediaColumns = [];
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->mediaColumns = config('media_columns.media_columns');
    }
    public function translatedAttributes()
    {
        if (property_exists($this->model, 'translatedAttributes')) {
            if (!empty($this->model->translatedAttributes)) {
                return ResponseHelper::format(200, true, 'success', $this->model->translatedAttributes);

            } else {
                return ResponseHelper::format(500, false, 'translatedAttributes property must has one value');
            }
        } else {
            return ResponseHelper::format(500, false, 'translatedAttributes property is required');
        }
    }
    public function translation_handler($data) {
        $langs = config('translatable.locales');
        $results = [];
        $translatedAttributesResponse = $this->translatedAttributes();
        if($translatedAttributesResponse['status']) {
            $translatedAttributes = $translatedAttributesResponse['data'];
            foreach ($langs as $lang) {
                foreach ($translatedAttributes as $item) {
                    $results[$lang][$item] = $data[$item.'_'.$lang];
                }
            }
            return ResponseHelper::format(200, true, 'success', $results);
        } else {
            return $translatedAttributesResponse;
        }
    }

    public function data_handler($data) :array{
        $results = [];
        if (property_exists($this->model, 'columns')) {
            foreach ($this->model->columns as $column) {
                if(!in_array($column, $this->mediaColumns)) {
                    $results[$column] = $data[$column];
                }
            }
            if (property_exists($this->model, 'translatedAttributes')) {
                
                $results = array_merge($results, $this->translation_handler($data)['data']);

            }
            return ResponseHelper::format(200, true, 'success', $results);

        } else {
            return ResponseHelper::format(500, false, 'columns property is required');

        }
    }
    public function all()
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

    public function create($data)
    {
        $data = request()->replace($data);   
        $response = $this->data_handler($data);   
        if($response['success']) {
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

    public function update($data, $id)
    {
        $data = request()->replace($data);   
        $response = $this->data_handler($data);   
        if($response['success']) {
            DB::beginTransaction();
            try {
                $category = $this->model->find($id);
                if($category != null) {
                    $category->update($response['data']);                
                    DB::commit();
                    $response = ResponseHelper::format(200, true, 'Success');    
                } else {
                    DB::rollBack();
                    return ResponseHelper::format(404, false, __('lang.not_found_record'));
                }
            } catch (\Throwable $th) {
                DB::rollBack();
                $response = ResponseHelper::format(500, false, $th->getMessage());
            }
        }
        return $response;
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $category = $this->model->find($id);
            if($category != null) {
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
    public function get_paginated($request, $count = 10) 
    {
        $modelName = strtolower(class_basename($this->model));
        $modelNamePlural = Str::plural($modelName);
        $searchTerm = $request->input('q', '');
        DB::beginTransaction();
        // try {
            $data = $this->model;
            if(count($this->model->indexWith) > 0) {
                $data = $data->with($this->model->indexWith);
            }
            if(count($this->model->indexWithCount) > 0) {
                $data = $data->withCount($this->model->indexWithCount);
            }
            $data = $data->join($modelName.'_translations', $modelNamePlural.'.id', '=', $modelName.'_translations.'.$modelName.'_id')
            ->where($modelName.'_translations.locale', '=', app()->getLocale()) // Ensure you're searching in the current locale
            ->where($modelName.'_translations.title', 'LIKE', "%{$searchTerm}%")
            ->distinct() // Ensure you don't get duplicate posts if they match multiple translations
            ->orderBy('id','DESC')
            ->paginate($count);
            
            $response = ResponseHelper::format(200, true, 'Success', $data);
        /* } catch (\Throwable $th) {
            DB::rollBack();
            $response = ResponseHelper::format(500, false, $th->getMessage());
        } */
        return $response;
    }
    public function translate_fields()
    {
        return $this->model->my_translatedAttributes;   
    }
    public function columns_fields()
    {
        return $this->model->my_columns;   
    }
}
