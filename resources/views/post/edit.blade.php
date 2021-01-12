@extends('layout.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('post.update', $post) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" class="form-control" name="title" value="{{ $post->title }}" id="exampleFormControlInput1" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" class="form-control" name="price" value="{{ $post->price }}" id="exampleFormControlInput1" placeholder="Price">
          </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3">
              {{ $post->desc }}
          </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
