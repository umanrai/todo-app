<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoretodoRequest;
use App\Http\Requests\UpdatetodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id', '=', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('todo.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretodoRequest $request)
    {
        Todo::create([
            'todo'          => ucwords($request->get('todo')), // Dasdsad Asdsadas Array
            'description'   => $request->get('description'),
            'user_id'       => auth()->user()->id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show( $todo)
    {
        $todo = Todo::findOrFail($todo);
        return view('todo.show')->with('todo',$todo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($todo)
    {
        $todo = Todo::findOrFail($todo);
        return view('todo.edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetodoRequest $request, $todo)
    {
        $todo = Todo::findOrFail($todo);

        $todo->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $todo) // Route model binding
    {
        $todo = Todo::findOrFail($todo);
        $todo->delete();
        return back();
    }
}
