@extends('layout.app')

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
        <label for="exampleFormControlInput1">Price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="exampleFormControlInput1" placeholder="Price">
        @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
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
