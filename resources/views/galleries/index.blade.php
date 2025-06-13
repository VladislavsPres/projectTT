@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Galleries</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('gallery/create') }}" class="btn btn-primary mb-3">Create New Gallery</a>

    @foreach($galleries as $gallery)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $gallery->name }}</h5>
                <p>{{ $gallery->description }}</p>
                <small>Author: {{ $gallery->user->name ?? 'Unknown' }}</small><br>
                <a href="{{ route('gallery/show', $gallery) }}" class="btn btn-sm btn-outline-secondary">View</a>
                <a href="{{ route('gallery/edit', $gallery) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('gallery/destroy', $gallery) }}" class="btn btn-sm btn-danger"
                   onclick="return confirm('Delete this gallery?')">Delete</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
