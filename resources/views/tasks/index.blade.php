@extends('layouts.app')

@section('title', 'LIST OF TASKS')

@section('content')
    @forelse($tasks as $task)
        <div>
            <a href='{{ route('tasks.show', ['task' => $task->id]) }}' @class(['line-through' =>  $task->completed])>
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>There are no tasks</div>
    @endforelse

    <nav class="mt-4">
        <a class="link" href="{{ route('tasks.create') }}">ADD A TASK</a>
    </nav>

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
