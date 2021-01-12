@extends('layout.app')

@section('content')
<div class="container">
    <form action="{{ route('search') }}" method="GET">
        @csrf
        <input type="text" name="search" class="input-form" id="">
        <button type="submit">Search</button>
    </form>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at->diffForHumans() }}</h6>
                      <p class="card-text">{{ Str::limit($post->desc, 120, '...') }} <a href="{{ route('post.show', $post) }}">Read more</a></p>
                      <a href="{{ route('post.edit', $post) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('post.delete',$post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
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
