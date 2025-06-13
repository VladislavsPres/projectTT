@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Gallery</h1>

    <form action="{{ route('gallery/store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Gallery Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('gallery') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
