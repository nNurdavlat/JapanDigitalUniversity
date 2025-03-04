<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Subject::query();
        $perPage = $request->get('perPage', 6);

        if($request->has('search')){
            $query->where('name','like','%'.$request->get('search').'%');
        }

        if($request->has('sort')){
            $query->orderBy('created_at',$request->get('sort'));
        }
        $subjects = $query->paginate($perPage);

        return response()->json($subjects);

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
    public function store(StoreSubjectRequest $request)
    {
        $validator = $request->validated();
        Subject::query()->create($validator);

        return response()->json(['message' => 'Subject created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject){
        return response()->json($subject);
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
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $validator = $request->validated();
        $subject->update($validator);
        return response()->json(['message' => 'Subject updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        Subject::query()->delete();
        return response()->json(['message' => 'Subject deleted successfully!']);
    }
}
