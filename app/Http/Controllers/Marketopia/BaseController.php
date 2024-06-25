<?php

namespace App\Http\Controllers\Marketopia;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BaseController extends Controller
{
  protected $model;

    protected $moduleName;

    protected $pageTitle;

    protected $pageDes;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if(!empty($with)){
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $pageTitle = "Control ".$moduleName;
        $pageDes = "Here you can add / edit / delete " .$moduleName;

        return view('admin.' . $this->getClassNameFromModel() . '.index', compact(
            'rows',
            'pageTitle',
            'moduleName',
            'pageDes',
            'sModuleName',
            'routeName'
        ));
    }

    public function create()
    {
        $moduleName = $this->getModelName();
        $pageTitle = "Create ". $moduleName;
        $pageDes = "Here you can create " .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;

        return view('admin.' . $folderName . '.create' , compact(
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName'
        ));
    }

    public function destroy($id)
    {
        $this->model->FindOrFail($id)->delete();

        return redirect()->route($this->getClassNameFromModel() . '.index');
    }

    public function edit($id)
    {
        $row = $this->model->FindOrFail($id);
        $moduleName = $this->getModelName();
        $pageTitle = "Edit " . $moduleName;
        $pageDes = "Here you can edit " .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();
        return view('admin.' . $folderName . '.edit', compact(
            'row',
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName',
            'append'
        ));
    }
    public function show($id)
    {

        $row = $this->model->FindOrFail($id);
        $moduleName = $this->getModelName();
        $pageTitle = "Edit " . $moduleName;
        $pageDes = "Here you can edit " .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('admin.' . $folderName . '.edit', compact(
            'row',
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName'
        ));
    }
    protected function filter($rows)
    {
        return $rows;
    }

    protected function with(){
        return [];
    }

    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName(){
        return Str::plural($this->getModelName());
    }

    protected function getModelName(){
        return class_basename($this->model);
    }

    protected function append(){
        return [];
    }
     
}
