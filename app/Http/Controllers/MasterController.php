<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMasterRequest;
use App\Http\Requests\UpdateMasterRequest;
use App\Models\Master;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Master::all());
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
     * @param  \App\Http\Requests\StoreMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterRequest $request)
    {
        if(!$request->authorize()){
            return response()->json('Not Authorised', 401);
        }

        $request->validate($request->rules());

        $master = Master::create([
            'name' => $request->name,
            'cash' => $request->cash
        ]);

        return response()->json($master, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        return response($master);
    }

    /**
     * Display the childrent of the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function children(Master $master)
    {
        return response($master->children);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterRequest  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterRequest $request, Master $master)
    {
        if(!$request->authorize()){
            return response()->json('Not Authorised', 401);
        }

        $request->validate($request->rules());

        $master->update([
            'name' => $request->name,
            'cash' => $request->cash
        ]);

        return response()->json($master, 201);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        $master->delete();

        return response()->json(null, 204);
    }
}
