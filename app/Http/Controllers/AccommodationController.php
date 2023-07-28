<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccommodationRequest;
use App\Http\Requests\UpdateAccommodationRequest;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try { 
            $accommodations = Accommodation::all();
            return response()->json($accommodations, 200);
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
    public function store(StoreAccommodationRequest $request)
    {
        try { 
            $accommodation = Accommodation::create($request->all());
            return response()->json($accommodation, 200);
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
            $accommodation = Accommodation::find($id);
            return response()->json($accommodation, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accommodation $accommodation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccommodationRequest $request, $id)
    {
        try { 
            $accommodation = Accommodation::find($id);
            $accommodation->accommodation = $request->accommodation;
            $accommodation->save();
            return response()->json($accommodation, 200);
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
            $accommodation = Accommodation::find($id);
            $accommodation->delete();
            return response()->json("success", 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
