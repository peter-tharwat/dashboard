<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ReportError;
use Illuminate\Http\Request;

class BackendReportErrorController extends Controller
{

    /*public function __construct()
    {
        $this->authorizeResource(ReportError::class, 'report-error'); 
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportError  $reportError
     * @return \Illuminate\Http\Response
     */
    public function show(ReportError $reportError)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportError  $reportError
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportError $reportError)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportError  $reportError
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportError $reportError)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportError  $reportError
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportError $reportError)
    {
        //
    }
}
