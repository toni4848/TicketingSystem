@extends('layouts.layout')

@section('linked')
    <span><a href="{{route('clients.index')}}">Clients</a></span><span> / </span><span>Client {{$client->id}} - {{$client->name}}</span>
@endsection

@section('button')
    <a class="text-white d-flex" href="{{route('clients.create')}}">
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
                <h1>Details of Client {{$client->name}}</h1>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Adress</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->adress}}</td>
                    <td>
                        <a class="text-white" href="{{route('clients.edit',$client)}}">
                            <button type="button" class="btn btn-green btn-sm m-0">Edit</button>
                        </a>
                    </td>
                    <td>
                        @can('admin',$client)
                        <form method="POST" action="{{route('clients.destroy',$client)}}">
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
