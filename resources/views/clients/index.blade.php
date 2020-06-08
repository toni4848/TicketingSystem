@extends('layouts.layout')

@section('linked')
    <span>Clients</span>
@endsection

@section('button')
    <form class="d-flex justify-content-center" action="{{route('clients.searchClients')}}" method="GET">
        <!-- Default input -->
        <input type="search" name="search" placeholder="Search clients" aria-label="Search" class="form-control">
        <button class="btn peach-gradient btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <a class="text-white d-flex" href="{{route('clients.create')}}">
        <button class="btn blue-gradient btn-sm my-0 p">Create</button>
    </a>
    <a class="text-white d-flex" href="/">
        <button class="btn peach-gradient btn-sm my-0 p">Home</button>
    </a>
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>List of Clients</h1>
            </div>
        </div>
        <div>
            @if ($clients->isEmpty())
                <p>There are currently no clients.</p>
            @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Adress</th>
                <th scope="col">View</th>
                <th scope="col">Add ticket</th>
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
                        <a class="text-white" href="{{route('tickets.create',$client)}}">
                            <button type="button" class="btn btn-green btn-sm m-0">Add</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
                {{ $clients->render() }}
            @endif
        </div>
        <div class="col-sm-12 mt-4">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
