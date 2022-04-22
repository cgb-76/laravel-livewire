<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use App\Models\Child;
use App\Http\Resources\ChildResource;
use App\Http\Resources\ChildCollectionResource;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Child::all());
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
     * @param  \App\Http\Requests\StoreChildRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildRequest $request)
    {
        if(!$request->authorize()){
            return response()->json('Not Authorised', 401);
        }

        $request->validate($request->rules());

        $child = Child::create([
            'name' => $request->name,
            'master_id' => $request->master_id,
            'cash' => $request->cash
        ]);

        return response()->json($child, 201);    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        return response($child);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function edit(Child $child)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildRequest  $request
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChildRequest $request, Child $child)
    {
        if(!$request->authorize()){
            return response()->json('Not Authorised', 401);
        }

        $request->validate($request->rules());

        $child->update([
            'name' => $request->name,
            'master_id' => $request->master_id,
            'cash' => $request->cash
        ]);

        return response()->json($child, 201);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        $child->delete();

        return response()->json(null, 204);
    }
}
