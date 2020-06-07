@extends('layouts.layout')

@section('linked')
    <span><a href="{{route('users.index')}}">Users</a></span><span> / </span><span>User {{$user->id}} - {{$user->name}}</span>
@endsection

@section('button')
    @can('admin')
    <a class="text-white d-flex" href="{{route('users.create')}}">
        <button class="btn blue-gradient btn-sm my-0 p">Create</button>
    </a>
    @endcan
    <a class="text-white d-flex" href="/">
        <button class="btn peach-gradient btn-sm my-0 p">Home</button>
    </a>
@endsection

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>Details of User {{$user->name}}</h1>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a class="text-white" href="{{route('users.edit',$user)}}">
                        <button type="button" class="btn btn-green btn-sm m-0">Edit</button>
                    </a>
                </td>
                <td>
                    @can('admin',$user)
                    <form method="POST" action="{{route('users.destroy',$user)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-red btn-sm m-0">Delete</button>
                    </form>
                    @else
                        <a class="text-center">Forbidden</a>
                    @endcan
                </td>
            </tr>
            </tbody>
        </table>
        <div class="col-sm-12 p-4">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection