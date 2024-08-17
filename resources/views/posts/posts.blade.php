
@extends('layouts.master')

<style>
    .content-section {
        margin-top: 80px; /* adjust the value to match the height of your navbar */
    }
</style>

@section('contents')

    <div class="container content-section">
        {{-- @if (session('success'))
            <p class="alert alert-danger">{{ session('success') }}</p>
        @endif --}}
        <div class="row">
            <div class="col-md-8 offset-md-2">

                @if (session('delete'))
                    <p class="alert alert-danger">{{ session('delete') }}</p>
                @endif
                @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                
                <h2 class="mb-4">Latest Posts</h2>
                @foreach($posts as $post)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>{{ $post->title }}</h5>
                            <small class="text-muted">
                                {{-- Posted by {{ Auth::user()->name }} - {{ $post->created_at->diffForHumans() }} --}}
                                Posted by {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <div class="card-body">
                            <p>{{ $post->body }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-warning">View Post</a>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-success">Update Post</a>
                            <span style="display: inline-block">   <form action="{{ route('posts.destroy', $post) }}" method="POST" class="my-3">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </span>
                        </div>
                        <div class="card-footer" >
                            <img style="width: 150px; height: 200px; border-radius: 10px; object-fit: cover;" src="{{ asset('storage/' . $post->image) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div>{{ $posts->links() }}</div>
@endsection
