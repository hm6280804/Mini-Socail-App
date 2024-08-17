@extends('layouts.master')

<style>
    .content-section {
        margin-top: 80px; /* adjust the value to match the height of your navbar */
    }
</style>

@section('contents')
    <div class="container content-section">
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
       <div class="row">
        <div class="col">
            <p>Hello {{ Auth::user()->name }}</p>
        </div>
       </div>

       <div class="row">
        <div class="col">
            <a href="{{ route('posts.index') }}">Latest Posts</a>
        </div>
       </div>

       <div class="row my-4">
        <div class="col">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>
       </div>
    </div>
@endsection