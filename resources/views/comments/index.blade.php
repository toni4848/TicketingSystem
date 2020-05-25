@extends('layout')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col align-self-center">
            <h1>Comments</h1>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Comment</th>
            <th scope="col">User</th>
            <th scope="col">Ticket</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->ticket_id }}</td>
                <td>
                    <a class="text-white" href="{{ route('comments.show', $comment) }}">
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
</div>
@endsection