@extends('layout')

@section('content')
<div class="container pt-5">
    <div>
        <p>{{ $comment->comment }}</p>
        <p>Author: {{ $comment->user->name }}</p>
        <p>Ticket: {{ $comment->ticket->title }}</p>
    </div>

    <div style="margin-top: 10px">
        <a class="text-white" href="{{ route('comments.edit', $comment) }}">
            <button type="button" class="btn btn-green btn-sm m-0">Edit</button>
        </a>
    </div>
    <div style="margin-top: 10px">           
        <form method="POST" action="{{ route('comments.destroy', $comment) }}">
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
</div>
@endsection