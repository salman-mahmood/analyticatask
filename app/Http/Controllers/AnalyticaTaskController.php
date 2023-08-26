<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnalyticaTask;

class AnalyticaTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = AnalyticaTask::all();
        // dd($tasks);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.addnew');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        AnalyticaTask::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => 'pending', // Assuming 'pending' as default status
            'api_id' => null, // Assuming no API ID for a newly created task
        ]);

        return redirect()->route('tasks.index'); // Redirect back to task list after creating

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task['task'] = AnalyticaTask::findOrFail($id);
        return view('tasks.edittask', $task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $task = AnalyticaTask::findOrFail($id);
        $task->update($validatedData);

        return redirect()->route('tasks.index'); // Redirect back to task list after updating

    }
    public function updatestatus(string $id)
    {
        $task = AnalyticaTask::findOrFail($id);
        $task->status = $task->status === 'completed' ? 'pending' : 'completed';
        $task->save();
        return redirect(route('tasks.index'))->with('success', 'Task status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = AnalyticaTask::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index'); // Redirect back to task list after deleting
    }
}
