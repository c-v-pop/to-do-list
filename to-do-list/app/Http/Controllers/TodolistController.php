<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{
    public function index() {
        $todolists = Todolist::orderBy('completed')->get();
        return view('home', compact('todolists'));
    }
    public function store(Request $request) {
        $data = $request -> validate ([
            'content' => 'required'
        ]);
        Todolist::create($data);
        return back();
    }
    public function complete(Todolist $todolist) {
        $todolist->update(['completed' => true]);
        return back();
    }
    public function markComplete(Todolist $task)
{
    $task->completed = true;
    $task->save();

    $pendingTasksCount = Todolist::where('completed', false)->count();

    return redirect()->back()->with('pendingTasksCount', $pendingTasksCount);
}
    public function destroy(Todolist $todolist)
    {
        $todolist -> delete();
        return back();
    }
    public function edit(Todolist $todolist)
    {
        return view('edit', compact('todolist'));
    }

    public function update(Request $request, Todolist $todolist)
    {
        $data = $request->validate([
            'content' => 'required',
        ]);

        $todolist->update($data);

        return redirect()->route('home');
    }
}
