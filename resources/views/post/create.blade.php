@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('post.store') }}">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="exampleFormControlInput1" placeholder="Title">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Category</label>
        <select name="category_id" id="" class="form-control">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Category</label>
        <select name="tags[]" multiple id="" class="form-control">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control @error('desc') is-invalid @enderror" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
        @error('desc')
        <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
