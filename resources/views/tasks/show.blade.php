@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task' => $task]) }}">
            EDIT
        </a>

        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">
                MARK AS {{ $task->completed ? 'NOT COMPLETED' : 'COMPLETED' }}
            </button>
        </form>

        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">
                DELETE
            </button>
        </form>
    </div>

    <nav class="mt-4">
        <a class="link" href="{{ route('tasks.home') }}">GO BACK</a>
    </nav>
@endsection