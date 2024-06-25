<?php

namespace App\Services;
use App\Repositories\CategoryRepository;

class CategoryService extends BaseService
{
    /**
     * Create a new class instance.
     */
    
    public function __construct(CategoryRepository $repo)
    {
        parent::__construct($repo);
    }
    public function create($request)
    {
        $request->merge(['slug'=>\MainHelper::slug($request->slug)]);
        $baseResponse = parent::create($request->validated());
        if($baseResponse['success']) {
            $category = $baseResponse['data'];
            $this->upload_image($request, $category);
        }
        return $baseResponse;
    }

    public function update($request, $id)
    {
        $request->merge(['slug'=>\MainHelper::slug($request->slug)]);
        $baseResponse = parent::update($request->validated(), $id);
        if($baseResponse['success']) {
            $category = $baseResponse['data'];
            $this->upload_image($request, $category);   
        }
        return $baseResponse;
    }
    public function upload_image($request, $category)  {
        if($request->hasFile('image')){
            $image = $category->addMedia($request->image)->toMediaCollection('image');
            $category->update(['image'=>$image->id.'/'.$image->file_name]);
        }
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$category,"description");
    }
    
}
