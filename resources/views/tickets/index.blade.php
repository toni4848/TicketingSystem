@extends('layout')

@section('linked')
    <span>Tickets</span>
@endsection

@section('button')
    <form class="d-flex justify-content-center">
        <!-- Default input -->
        <input type="search" placeholder="Search tickets" aria-label="Search" class="form-control">
        <button class="btn aqua-gradient btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <a class="text-white d-flex" href="{{route('tickets.create')}}">
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
                <h1>List of Tickets</h1>
            </div>
        </div>
        <div>
            @if ($tickets->isEmpty())
                <p>There are currently no states.</p>
            @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">State</th>
                <th scope="col">Client</th>
                <th scope="col">User</th>
                <th scope="col">View</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->state->state}}</td>
                    <td>{{$ticket->client->name}}</td>
                    <td>{{$ticket->user->username}}</td>
                    <td>
                        <a class="text-white" href="{{route('tickets.show',$ticket->id)}}">
                        <button type="button" class="btn btn-indigo btn-sm m-0">View</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
                {{$tickets->render()}}
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
