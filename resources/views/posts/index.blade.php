<x-layout>
    {{-- {{ asset('storage/'. $post->image) }} --}}
<div class="container mt-4 mb-4">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <img src="https://picsum.photos/500/300" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text truncate">{{ \Str::limit($post->content, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">By {{"Temam"}}</small>
                            <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary mt-3 w-100">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    {{-- <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div> --}}
</div>




</x-layout>
