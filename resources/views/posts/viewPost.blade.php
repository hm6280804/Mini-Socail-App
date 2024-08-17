

@extends('layouts.master')

<style>
    .content-section {
        margin-top: 80px; /* adjust the value to match the height of your navbar */
    }
</style>

@section('contents')
    <div class="container content-section">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="mb-4"></h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>{{ $post->title }}</h5>
                            <small class="text-muted">
                                Posted by {{ Auth::user()->name }} - {{ $post->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <div class="card-body">
                            <p>{{ $post->body }}</p>
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
