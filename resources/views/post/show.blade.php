@extends('layout.app')

@section('content')
<div class="container">
    <h3>
        {{ $post->title }}
    </h3>
    <div class="text-secondary">
        {{ $post->price }} <br>
    </div>
    <div class="text-secondary">
        {{ $post->created_at->format('d M, Y') }}
    </div>
    {!! nl2br($post->desc) !!}
</div>
@endsection
