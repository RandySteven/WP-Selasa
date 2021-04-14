@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{ asset('storage/'.$post->image) }}" width="250" height="200" alt="{{ $post->image }}">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at->diffForHumans() }}</h6>
                      <a href="{{ route('category', $post->category) }}">{{ $post->category->category }}</a>
                      <p class="card-text">{{ Str::limit($post->desc, 120, '...') }} <a href="{{ route('post.show', $post) }}">Read more</a></p>
                      @auth
                        @if (Auth::user()->id == $post->user_id || Auth::user()->hasRole('Admin'))
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('post.edit', $post) }}" class="btn btn-success">Edit</a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('post.delete',$post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                      @endauth
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $posts->links() }}
    </div>
</div>
@endsection
