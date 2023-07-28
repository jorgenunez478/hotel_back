<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try { 
            $rooms = Room::all();
            return response()->json($rooms, 200);
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
    public function store(StoreRoomRequest $request)
    {
        try { 
            $room = Room::create($request->all());
            return response()->json($room, 200);
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
            $room = Room::find($id);
            return response()->json($room, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, $id)
    {
        try { 
            $room = Room::find($id);
            $romm->count = $request->count;
            $romm->hotel_id = $request->hotel_id;
            $romm->room_type_id = $request->room_type_id;
            $romm->accommodation_id = $request->accommodation_id;
            $room->save();
            return response()->json($room, 200);
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
            $room = Room::find($id);
            $room->delete();
            return response()->json("success", 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
