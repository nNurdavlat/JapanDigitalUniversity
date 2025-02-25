<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){

        $query = Group::query();
        $perPage = $request->get('perPage', 6);

        if($request->has('search')){
            $query->where('name','like','%'.$request->get('search').'%');
        }
        if($request->has('sort')){
            $query->orderBy('created_at',$request->get('sort'));
        }

        $groups = $query->paginate($perPage);
        return response()->json($groups);
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
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|unique:groups',
        ]);

        Group::query()->create($validator);

        return response()->json(['message' => 'Group created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return response()->json($group);
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
    public function update(Request $request, Group $group)
    {
        $validator = $request->validate([
            'name' => 'required|unique:groups',
        ]);

        $group->update($validator);

        return response()->json(['message' => 'Group updated successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        Group::query()->delete();
        return response()->json(['message' => 'Group deleted successfully!']);
    }
}
