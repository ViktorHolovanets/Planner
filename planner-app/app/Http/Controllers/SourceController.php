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
//        $source=Source::find(1);
//        $source->students()->attach([2,]);
        return view('source.index');
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
     * @param \App\Http\Requests\StoresourceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSourceRequest $request)
    {
        // dd($request);
        $data = $request->validated();
        //dd($data);

        Source::create($data);
        return redirect()->route('sources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Source $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatesourceRequest $request
     * @param \App\Models\Sourceource $source
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSourceRequest $request, Source $source)
    {
        //dd($request);
        $data = $request->validated();
        //dd($data);
        $source->update($data);
        return redirect()->route('sources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        $source->delete();
        return redirect()->route('sources.index');
    }
}
