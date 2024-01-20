<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks', [
            'tasks' => Task::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function allTasks(){
        $tasks = Task::all();
        return response()->json([
            'tasks' => $tasks,
        ], 200);
    }
    public function create()
    {
        return  view ('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:100',
            'status' => 'required|integer',
            'idOner' => 'required|integer|exists:users,id',
            'idMaking' => 'required|integer|exists:users,id',
        ]);
        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        if($task) {
            return response()->json([
                'message' => 'Task created successfully',
                'task' => $task,
            ], 201);
        }
        return response()->json([
            'message' => 'Unable to create task',
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        if($task) {
            return response()->json([
                'task' => $task,
            ], 200);
        }
        return response()->json([
            'message' => 'Task not found',
        ], 404);
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
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        if($task) {
            $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'required|string|max:100',
                'status' => 'required|boolean',
                'idOner' => 'required|integer|exists:users,id',
                'idMaking' => 'required|integer|exists:users,id',
            ]);
            $task->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'idOner' => $request->idOner,
                'idMaking' => $request->idMaking,
            ]);
            return response()->json([
                'message' => 'Task updated successfully',
                'task' => $task,
            ], 200);
        }
        return response()->json([
            'message' => 'Task not found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        if($task) {
            $task->delete();
            return response()->json([
                'message' => 'Task deleted successfully',
            ], 200);
        };
        return response()->json([
            'message' => 'Task not found',
        ], 404);
    }
}
