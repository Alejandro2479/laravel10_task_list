@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form method="POST" action="{{ route('taks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input text="text" name="title" id="title">
        </div>

        <div>
            <label for="description">Description</label>
            <input text="description" name="description" id="description" rows="5">
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <input text="long_description" name="long_description" id="long_description" rows="10">
        </div>

        <div>
            <button type="submit">ADD TASK</button>
        </div>
    </form>
@endsection