@extends('layouts.app')

@section('title', isset($task) ? 'EDIT TASK' : 'ADD A TASK')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        
        @csrf
        @isset($task)
            @method('PUT')
        @endisset()
        <div class="mb-4">
            <label for="title">Title</label>
            <input text="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')]) value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10" @class(['border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2">
            <button class="btn" type="submit">
                @isset($task)
                    UPDATE TASK
                @else
                    ADD TASK
                @endisset
            </button>
        </div>

        <nav class="mt-4">
            <a class="link" href="{{ route('tasks.home') }}">GO BACK</a>
        </nav>
    </form>
@endsection
