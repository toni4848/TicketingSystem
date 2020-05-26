@extends('layout')

@section('linked')
    <span>Tickets</span>
@endsection

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>Tickets (GET/tickets)</h1>
                <div class="col ">
                <form class="form-inline md-form mr-auto mb-4">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
                </form>
                </div>
            </div>
        </div>
        <div>
            @if ($tickets->isEmpty())
                <p>There are currently no states.</p>
            @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">State</th>
                <th scope="col">Client</th>
                <th scope="col">User</th>
                <th scope="col">/states/{state}</th>
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
        <a class="text-white" href="/">
        <button class="btn peach-gradient">Početna</button>
        </a>
        <a class="text-white" href="{{route('tickets.create')}}">
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
