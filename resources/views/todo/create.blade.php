@extends('layouts.master')

@section('title', 'Create Todo')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Todo</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('todo.index') }}" type="button" class="btn btn-sm btn-outline-secondary">List</a>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi"><use xlink:href="#calendar3"/></svg>
                This week
            </button>
        </div>
    </div>

    <form action="{{ route('todo.store') }}" method="post">

        @csrf

        <div class="mb-3">
            <label for="todo" class="form-label">Todo</label>
            <input id="todo" placeholder="Enter your todo" name="todo" type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="description-text" class="form-label">Description</label>
            <textarea id="description-text" placeholder="Enter your description" name="description"
                      class="form-control" cols="30" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
