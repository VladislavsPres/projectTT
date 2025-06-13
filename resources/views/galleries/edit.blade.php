@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Gallery</h1>

    <form action="{{ route('gallery/update', $gallery) }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Gallery Name</label>
            <input type="text" class="form-control" name="name" value="{{ $gallery->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description">{{ $gallery->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('gallery') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
