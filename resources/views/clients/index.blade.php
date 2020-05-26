@extends('layout')

@section('linked')
    <span>Clients</span>
@endsection

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>Clients (GET/clients)</h1>
            </div>
        </div>
        <div>
            @if ($clients->isEmpty())
                <p>There are currently no clients.</p>
            @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Adress</th>
                <th scope="col">View /clients/{client}</th>
                <th scope="col">Add ticket /clients/{client}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->adress}}</td>
                    <td>
                        <a class="text-white" href="{{route('clients.show',$client)}}">
                        <button type="button" class="btn btn-indigo btn-sm m-0">View</button>
                        </a>
                    </td>
                    <td>
                        <a class="text-white" href="{{route('tickets.create',$client->id)}}">
                            <button type="button" class="btn btn-green btn-sm m-0">Add ticket</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
                {{ $clients->render() }}
            @endif
        </div>
        <a class="text-white" href="/">
        <button class="btn peach-gradient">Početna</button>
        </a>
        <a class="text-white" href="{{route('clients.create')}}">
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
