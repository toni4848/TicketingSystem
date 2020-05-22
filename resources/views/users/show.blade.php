@extends('layout')

@section('content')
<div class="container pt-5">
    <div>
        <p>Name: {{ $user->name }}</p>
        <p>Username: {{ $user->username }}</p>
        <p>User ID: {{ $user->id }}</p>
    </div>

    <div style="margin-top: 10px">
        <a class="text-white" href="{{ route('users.edit', $user) }}">
            <button type="button" class="btn btn-green btn-sm m-0">Edit</button>
        </a>
    </div>
    <div style="margin-top: 10px">           
        <form method="POST" action="{{ route('users.destroy', $user) }}">
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