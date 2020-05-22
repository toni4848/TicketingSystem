@extends('layout')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col align-self-center">
            <h1>Users</h1>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <a class="text-white" href="{{ route('users.show', $user->id) }}">
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
    <a class="text-white" href="{{ route('users.create') }}">
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