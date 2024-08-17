
@extends('layouts.master')

 @section('contents')

    <main class="pt-5 mt-5">
        <div class="container mt-4">
            <h1 class="text-center mb-4">Create Post</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                                 <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Post body</label>
                            <textarea name="body" class="form-control @error('email') is-invalid @enderror"  rows="5" placeholder="Enter you post">  </textarea>
                            @error('body')
                                 <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Cover Photo</label>
                            <input type="file" name="image" id="image">
                            @error('image')
                                 <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        

                        <button type="submit" class="my-2 btn btn-primary w-100">create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
