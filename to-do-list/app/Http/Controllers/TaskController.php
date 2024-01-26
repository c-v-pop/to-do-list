<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('completed')->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:255',
        ]);

        Task::create([
            'description' => $request->description,
        ]);

        return redirect(route('tasks.index'));
    }

    // Implement edit, update, mark as complete, delete, etc.
}
