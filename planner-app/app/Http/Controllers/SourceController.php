<?php

namespace App\Http\Controllers;

use App\Models\source;
use App\Http\Requests\StoresourceRequest;
use App\Http\Requests\UpdatesourceRequest;

class SourceController extends Controller
{
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
     * @param  \App\Http\Requests\StoresourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresourceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(source $source)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesourceRequest  $request
     * @param  \App\Models\source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesourceRequest $request, source $source)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(source $source)
    {
        //
    }
}
