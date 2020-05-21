@extends('layout')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col align-self-center">
            <h1>Comment (GET/comments/{comment})</h1>
        </div>
    </div>
    <div>
        <p>{{ $comment->comment }}</p>
        <p>Author: {{ $comment->user->name }}</p>
        <p>Article: {{ $comment->ticket_id }}</p>
    </div>

    <div style="margin-top: 10px">
        <a class="text-white" href="/states/{{ $comment->id }}/edit">
            <button type="button" class="btn btn-green btn-sm m-0">Edit</button>
        </a>
    </div>
    <div style="margin-top: 10px">           
        <form method="POST" action="/states/{{ $comment->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-red btn-sm m-0">Delete</button>
        </form>
    </div>
    <div>
        <a class="text-white" href="/">
            <button class="btn peach-gradient">Početna</button>
        </a>
    </div>
    <div class="col-sm-12 p-4">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
</div>
@endsection