@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Photo</h1>

    <form action="{{ route('photo/update', $photo) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $photo->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description">{{ $photo->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="file">Replace Image (optional)</label>
            <input type="file" class="form-control" name="file">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('photo/show', $photo) }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
