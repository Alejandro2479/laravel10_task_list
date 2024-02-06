@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0, 8rem;
        }
    </style>

@section('content')
    <form method="POST" action="{{ route('taks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input text="text" name="title" id="title">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <input text="description" name="description" id="description" rows="5">
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <input text="long_description" name="long_description" id="long_description" rows="10">
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">ADD TASK</button>
        </div>
    </form>
@endsection