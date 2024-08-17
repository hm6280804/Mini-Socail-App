
@extends('layouts.master')

 @section('contents')

    <main class="pt-5 mt-5">
        <div class="container mt-4">
            <h1 class="text-center mb-4">Edit Post</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $post->title }}">
                            @error('title')
                                 <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Post body</label>
                            <textarea name="body" class="form-control @error('email') is-invalid @enderror"  rows="5" placeholder="Enter you post"> {{ $post->body }} </textarea>
                            @error('body')
                                 <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        @if ($post->image)
                            <div class="mb-3" >
                                <label for="">Current Cover Photo</label>
                                <img style="width: 150px; height: 200px; border-radius: 10px; object-fit: cover;" src="{{ asset('storage/' . $post->image) }}" alt="">
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="image" class="form-label">Cover Photo</label>
                            <input type="file" name="image" id="image">
                            @error('image')
                                 <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        

                        <button type="submit" class="my-2 btn btn-primary w-100">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
