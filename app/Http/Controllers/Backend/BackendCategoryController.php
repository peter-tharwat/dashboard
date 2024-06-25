<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Test\TestStatus\Success;

class BackendCategoryController extends BaseController
{

    public function __construct(CategoryService $service)
    {
        parent::__construct($service);
        $this->middleware('can:categories-create', ['only' => ['create','store']]);
        $this->middleware('can:categories-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:categories-update',   ['only' => ['edit','update']]);
        $this->middleware('can:categories-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $response = $this->service->get_paginated($request);
        if ($response['success']) {
            $categories = $response['data']; 

            return view('admin.categories.index',compact('categories'));
        } else {
            abort($response['status'], $response['message']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $translateFields = $this->service->translate_fields();
        $columns_fields = $this->service->columns_fields();
        return view('admin.categories.create', compact('translateFields', 'columns_fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $response = $this->service->create($request);
        if ($response['success']) {
            toastr()->success(__('utils/toastr.category_store_success_message'), __('utils/toastr.successful_process_message'));
        } else {
            toastr()->error(__('utils/toastr.failed_process_message'));
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     */
    public function edit(Category $category)
    {   
        $translateFields = $this->service->translate_fields();
        $columns_fields = $this->service->columns_fields();

        return view('admin.categories.edit',compact('category', 'translateFields', 'columns_fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $response = $this->service->update($request->validated(), $category->id);
        if ($response['success']) {
            toastr()->success(__('utils/toastr.category_update_success_message'), __('utils/toastr.successful_process_message'));
        } else {
            toastr()->error(__('utils/toastr.failed_process_message'));
        }
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $response = $this->service->delete($category->id);
        if ($response['success']) {
            toastr()->success(__('utils/toastr.category_update_success_message'), __('utils/toastr.successful_process_message'));
        } else {
            toastr()->error(__('utils/toastr.failed_process_message'));
        }
        return redirect()->route('admin.categories.index');
    }
}
