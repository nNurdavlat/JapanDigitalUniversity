<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupStudentRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Http\Requests\UpdateGroupStudentRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupStudentController extends Controller
{
    public function store(StoreGroupStudentRequest $request){
        $validator = $request->validated();

        $group = Group::query()->findOrFail($validator['group_id']);
        $group->students()->attach($validator['student_id']);

        return response()->json(['message'=>'Student added to group']);
    }


    public function update(string $id, UpdateGroupStudentRequest $request){
        $validator = $request->validated();
        $group = Group::query()->findOrFail($id);

        $group->students()->detach($validator['student_id']);

        return response()->json(['message'=>'Student updated from group successfully'], 200);
    }

    public function destroy(string $id, Request $request){
        $validator = $request->validate([
            'group_id' => 'required|exists:groups,id'
        ]);
        $group = Group::query()->findOrFail($validator['group_id']);
        $group->students()->detach($id);
        return response()->json(['message'=>'Student deleted from group successfully'], 200);
    }
}
