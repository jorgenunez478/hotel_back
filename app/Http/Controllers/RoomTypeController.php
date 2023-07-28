<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try { 
            $roomType = RoomType::all();
            return response()->json($roomType, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomTypeRequest $request)
    {
        try { 
            $roomType = RoomType::create($request->all());
            return response()->json($roomType, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try { 
            $roomType = RoomType::find($id);
            return response()->json($roomType, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomTypeRequest $request, $id)
    {
        try { 
            $roomType = RoomType::find($id);
            $roomType->type = $request->type;
            $roomType->save();
            return response()->json($roomType, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try { 
            $roomType = RoomType::find($id);
            $roomType->delete();
            return response()->json("success", 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
