<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexByHotel($idHotel)
    {
        try { 
            $rooms = Room::where('hotel_id', $idHotel)->get();
            return response()->json($rooms, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

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
            if($this->validateRecord($request) === true){
                $room = Room::firstOrCreate($request->all());
                return response()->json($room, 200);
            }else{
                return response()->json([ 'error' => $this->validateRecord($request)], 500);
            }            
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
            if($this->validateRecord($request) === true){
                $room = Room::find($id);
                $room->count = $request->count;
                $room->hotel_id = $request->hotel_id;
                $room->room_type_id = $request->room_type_id;
                $room->accommodation_id = $request->accommodation_id;
                $room->save();
                return response()->json($room, 200);
            }else{
                return response()->json([ 'error' => $this->validateRecord($request)], 500);
            } 
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

    public function validateRecord($request){
        $totalRooms = 0;
        $issetRoom = false;

        $hotel = Hotel::find($request->hotel_id);
        $roomsHotel = Room::where('hotel_id', $request->hotel_id)->get();
        foreach($roomsHotel as $room) {
            $totalRooms += $room->count;
            $issetRoom = (($room->hotel_id == $request->hotel_id) && 
                            ($room->room_type_id == $request->room_type_id) &&
                            ($room->accommodation_id == $request->accommodation_id)
                        ) ? true : false;
        }

        $totalRooms += $request->count;

        if($issetRoom){
            return 'you can not repeat record.';
        }else if($totalRooms > $hotel->number_rooms) {
            return 'Max count rooms enabled is ' . $hotel->number_rooms;
        }else{
            return true;
        }
    }
}
