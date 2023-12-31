@extends('layouts.master')

@section('title', 'Edit Todo')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Todo</h1>
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

    <form action="{{ route('todo.update', [ 'todo' => $todo->id ]) }}" method="post">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Todo</label>
            <input name="todo" type="text" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{$todo->todo}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $todo->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
