<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupSubjectController extends Controller
{

    public function store(Request $request)
    {
        $validator = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);


        $group = Group::findOrFail($validator['group_id']);

        $group->subject()->attach($validator['subject_id']);

        return response()->json(['message' => 'Group attached'], 200);
    }







}
