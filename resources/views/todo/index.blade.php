@extends('layouts.master')

@section('title', 'Todo List')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Todo list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('todo.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Create</a>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi"><use xlink:href="#calendar3"/></svg>
                This week
            </button>
        </div>
    </div>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Todo</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $todo->todo }}</td>
                    <td>{{ $todo->description }}</td>
                    <td>
                        @if ($todo->status === 0)
                            @php
                                $status = 'primary';
                            @endphp
                        @elseif ($todo->status === 1)
                            @php
                                $status = 'secondary';
                            @endphp
                        @else
                            @php
                                $status = 'success';
                            @endphp
                        @endif

                        <span class="badge text-bg-{{ $status }}">
                            @if ($todo->status === 0)
                                Pending
                            @elseif ($todo->status === 1)
                                In Progress
                            @else
                                Completed
                            @endif
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('todo.edit', [ 'todo' => $todo->id ]) }}" role="button">Edit</a>
                        <a class="btn btn-secondary" href="{{ route('todo.show', [ 'todo' => $todo->id ]) }}" role="button">Show</a>
                        <a class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();" href="{{ route('todo.destroy', [ 'todo' => $todo->id ]) }}" role="button">Delete</a>

                        <form action="{{ route('todo.destroy', [ 'todo' => $todo->id ]) }}" id="delete-form" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $todos->links() }}
    </div>
@endsection
