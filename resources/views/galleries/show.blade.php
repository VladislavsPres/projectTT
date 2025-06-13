@if($gallery->photos->count())
    <h3 class="mt-4">Photos</h3>
    <div class="row">
        @foreach($gallery->photos as $photo)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($photo->filename)
                        <img src="{{ asset('storage/photos/' . $photo->filename) }}" class="card-img-top" alt="photo">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $photo->title }}</h5>
                        <p class="card-text">{{ $photo->description }}</p>
                        <a href="{{ route('photo/show', $photo) }}" class="btn btn-sm btn-outline-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="mt-3">This gallery has no photos yet.</p>
@endif
