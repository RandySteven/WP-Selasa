@extends('layouts.app')

@section('title', 'About')

@section('style')
    {{-- <style>
        body{
            background-color: blue
        }
    </style> --}}
@endsection

@section('content')
    <h1>About</h1>
    @auth
        @if (Auth::user()->hasRole('Admin'))
            <button class="btn btn-success">Edit About</button>
        @endif
    @endauth
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis quis fugiat, laborum corporis in hic esse veritatis excepturi neque ut accusantium blanditiis facilis necessitatibus quasi tempora reiciendis, eos nisi maiores?</p>
@endsection
