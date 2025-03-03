<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectTeacherController extends Controller
{
    public function store(Request $request)
    {
        $validator = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $teacher = User::query()->find($validator['teacher_id']);

        if (!$teacher) {
            return response()->json(['error' => 'Teacher not found'], 404);
        }

        $teacher->subjects()->attach($validator['subject_id']);

        return response()->json(['message' => 'Subject Teacher Added'], 201);
    }

}
