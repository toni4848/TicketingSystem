@extends('layout')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col align-self-center">
            <h1>Comments (GET/comment)</h1>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Comment</th>
            <th scope="col">User</th>
            <th scope="col">Ticket</th>
            <th scope="col">/comments/{comment}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->ticket_id }}
                <td>
                    <a class="text-white" href="{{ route('comments.show', $comment->id) }}">
                    <button type="button" class="btn btn-indigo btn-sm m-0">View</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="text-white" href="/">
    <button class="btn peach-gradient">Početna</button>
    </a>
    <a class="text-white" href="{{ route('comments.create') }}">
        <button class="btn blue-gradient">Create</button>
    </a>
    <div class="col-sm-12 mt-4">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
</div>
@endsection