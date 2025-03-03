<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $validated = $request->validated();


        Schedule::query()->create($validated);
        return response()->json(['message'=>'Schedule created successfully'], 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, $id)
    {
        $validated = $request->validated();
        $subject = update($validated);
        return response()->json(['message'=>'Schedule updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::query()->find($id);
        $schedule->delete();
        return response()->json(['message'=>'Schedule deleted successfully'], 200);
    }

}
