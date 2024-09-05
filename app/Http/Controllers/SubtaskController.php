<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
use App\Models\Task;
use Illuminate\Http\Request;


class SubtaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($task)
    {
        return view('subtasks.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $task)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string|in:todo,in_progress,done',
        ]);

        $subtask = Subtask::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'task_id' => $task,
        ]);
        return redirect()->route('task.show', $task)->with('success', 'Subtask created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subtask $subtask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subtask $subtask)
    {
        return view('subtasks.edit', compact('subtask'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subtask $subtask)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string|in:todo,in_progress,done',
        ]);

        $subtask->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('task.show', $subtask->task->id)->with('success', 'Subtask updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subtask $subtask)
    {
        $subtask->delete();
        return redirect()->route('task.show', $subtask->task->id)->with('success', 'Subtask deleted successfully.');
    }
}
