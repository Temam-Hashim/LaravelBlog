<x-layout>
    <h1>Welcome {{ auth()->user()->name }}</h1>


    <div class="d-flex  justify-content-center">


        <div class="card m-4 p-2 bg-opacity-75" style="width: 40rem;">

            @if (session('success'))
                <x-flashMsg msg="{{ session('success') }}" bg="bg-info" />
            @endif

            <h1>Create Post</h1>
            <div class="card-body">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Post title</label>
                        <input type="text" class="form-control" name="title" value={{ old('title') }}>
                        @error('title')
                            <div id="nameHelp" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Post Content</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                        @error('content')
                            <div id="content" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>




                    <button type="submit" class="btn btn-primary w-100 py-2">Create</button>
                </form>
            </div>
        </div>
    </div>


    <h1 class="text-primary text-center">Latest Posts</h1>
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
                            <small class="text-muted">By {{ auth()->user()->name}}</small>
                            <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary mt-3 w-100">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>
