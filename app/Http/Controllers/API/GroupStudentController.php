<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupStudentController extends Controller
{
    public function store(Request $request){

        $validator = $request->validate([
            'group_id' => 'required|integer|exists:groups,id',
            'student_id' => 'required|integer|exists:users,id',
        ]);

        $group = Group::query()->findOrFail($validator['group_id']);

        $group->students()->attach($validator['student_id']);

        return response()->json(['message'=>'Student added to group']);
    }
}
