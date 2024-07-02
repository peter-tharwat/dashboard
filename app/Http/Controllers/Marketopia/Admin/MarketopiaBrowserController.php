<?php

namespace App\Http\Controllers\Marketopia\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Marketopia\BaseController;
use App\Models\Marketopia\MarketopiaBrowser;
use Illuminate\Http\Request;

class MarketopiaBrowserController extends BaseController
{
    public function __construct(MarketopiaBrowser $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        
        // Get Paginated Browsers with filter by translation name with astrotomic/laravel-translatable package
        $rows = $this->model->with('browser_translations')
            ->when(request('search'), function ($query) {
                $query->where('name','like', '%' . request('search') . '%');
            })
        ->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $pageTitle = "Control ".$moduleName;
        $pageDes = "Here you can add / edit / delete " .$moduleName;

        return view('admin.marketopia.browsers.index', compact(
            'rows',
            'pageTitle',
            'moduleName',
            'pageDes',
            'sModuleName',
            'routeName'
        ));


        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $moduleName = $this->getModelName();
        $pageTitle = "Create ". $moduleName;
        $pageDes = "Here you can create " .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;

        // Return the create view
        return view('admin.marketopia.browsers.create', compact(
            'pageTitle',
            'moduleName',
            'pageDes',
            'routeName'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation name_en and name_ar
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
        ]);
        // create a browser record with translations
        $this->model->create([
            'en' => [
                'bane' => $request->name_en
            ],
            'ar' => [
                'ar' => $request->name_ar,
            ],
        ]);
        // return to index page with success message translated
        return redirect()->route('admin.marketopia-browsers.index')->with('success', 'Browser added successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = $this->model->FindOrFail($id);
        $moduleName = $this->getModelName();
        $pageTitle = "Edit " . $moduleName;
        $pageDes = "Here you can edit " .$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('admin.marketopia.browsers.edit', compact(
            'row',
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
        return view('admin.marketopia.browsers.edit', compact(
            'row',
            'pageTitle',
            'moduleName',
            'pageDes',
            'folderName',
            'routeName',
            'append'
        ));
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // validation name_en and name_ar
         $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
        ]);
        // create a browser record with translations
        $this->model->firstOrFail($id)->update([
            'en' => [
                'bane' => $request->name_en
            ],
            'ar' => [
                'ar' => $request->name_ar,
            ],
        ]);
        // return to index page with success message translated
        return redirect()->route('admin.marketopia-browsers.index')->with('success', 'Browser updated successfully');
    }

}
