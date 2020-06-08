@extends('layouts.layout')

@section('linked')
    <span>Comments</span>
@endsection

@section('button')
    <a class="text-white d-flex" href="{{route('comments.create')}}">
        <button class="btn blue-gradient btn-sm my-0 p">Create</button>
    </a>
    <a class="text-white d-flex" href="/">
        <button class="btn peach-gradient btn-sm my-0 p">Home</button>
    </a>
@endsection

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
            <th scope="col">View</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->ticket->title }}</td>
                <td>
                    <a class="text-white" href="{{ route('comments.show', $comment) }}">
                    <button type="button" class="btn btn-indigo btn-sm m-0">View</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$comments->render()}}
</div>
@endsection