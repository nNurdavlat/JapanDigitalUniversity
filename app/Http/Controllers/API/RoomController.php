<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Room::query();
        $perPage = $request->get('perPage', 6);


        if($request->has('search')){
            $query->where('name','like','%'.$request->get('search').'%');
        }

        if($request->has('sort')){
            $query->orderBy('created_at',$request->get('sort'));
        }

        $rooms = $query->paginate($perPage);
        return response()->json($rooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $validator = $request->validated();
        Room::query()->create($validator);

        return response()->json(['message' => 'Room successfully created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return response()->json($room);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $validator = $request->validated();
        $room->update($validator);

        return response()->json(['message' => 'Room successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json(['message' => 'Room successfully deleted']);
    }
}
