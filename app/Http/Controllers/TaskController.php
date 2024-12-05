<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate(8);
        return response()->json($tasks);
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
    public function store(ValidationTaskRequest $request)
    {

     $create= Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_completed'=>$request->is_completed,
            'createdAt'=>now()
        ]);
        return response()->json([
            'data'=>$create,
            'message'=>__('validation.created_task')
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task=Task::FindOrFail($id);
        return response()->json(['data'=>$task],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidationTaskRequest $request, string $id)
    {
     $tasks= Task::FindOrFail($id);
     $tasks->update($request->all());
        return response()->json([
            'data'=>$tasks,
            'message'=>__('validation.update_task')
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::FindorFail($id)->delete();
      return  response()->json([
            'message'=>__('validation.delete_task')
        ],200);
    }

}
