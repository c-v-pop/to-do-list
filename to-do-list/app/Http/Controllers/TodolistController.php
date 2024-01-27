<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{
    public function index() {
        $todolists = Todolist::all();
        return view('home', compact('todolists'));
    }
    public function store(Request $request) {
        $data = $request -> validate ([
            'content' => 'required'
        ]);
        Todolist::create($data);
        return back();
    }
    public function destroy(Todolist $todolist)
    {
        $todolist -> delete();
        return back();
    }
}
