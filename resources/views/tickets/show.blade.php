@extends('layout')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>State (GET/states/{state})</h1>
            </div>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">State</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Edit (GET/tickets/{ticket}/edit</th>
                    <th scope="col">Delete (DELETE/tickets/{ticket}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->state->state}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>{{$ticket->updated_at}}</td>
                    <td>
                        <a class="text-white" href="{{route('tickets.edit',$ticket->id)}}">
                            <button type="button" class="btn btn-green btn-sm m-0">Edit</button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('tickets.destroy',$ticket->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-red btn-sm m-0">Delete</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="p-4">
                <div class="card">
                    <h5 class="card-header h5">{{$ticket->title}}</h5>
                    <div class="card-body">
                        <p class="card-text">{{$ticket->body}}</p>
                    </div>
                </div>
                <div class="p-2"></div>
                <div class="row">
                    <div class="col-sm-6 mb-4 mb-md-0">
                        <div class="card">
                            <div class="card-header">
                                Client
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$ticket->client->name}}</h5>
                                <p class="card-text">{{$ticket->client->email}}</p>
                                <p class="card-text">{{$ticket->client->adress}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                User
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$ticket->user->name}}</h5>
                                <p class="card-text">{{$ticket->user->username}}</p>
                                <p class="card-text">{{$ticket->state->state}} | {{$ticket->created_at}} | {{$ticket->updated_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row pl-4">
        <a class="text-white" href="/">
            <button type="button" class="btn peach-gradient example z-depth-5">Početna</button>
        </a>
        <a class="text-white" href="{{route('tickets.edit',$ticket->id)}}">
            <button type="button" class="btn tempting-azure-gradient example z-depth-5">Edit</button>
        </a>
        <form method="POST" action="{{route('tickets.destroy',$ticket->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class=" text-white btn young-passion-gradient example z-depth-5">Delete</button>
        </form>
        <a class="text-white" href="{{route('comments.create')}}">
            <button type="button" class="btn blue-gradient example z-depth-5">Leave a comment</button>
        </a>
        </div>

        <div class="col align-self-center" style="margin-top: 40px">
            <h1>Comments</h1>
        </div>
        @foreach ($ticket->comments as $comment)
            <div class="p-2">
                <div class="card">
                    <div class="card-header">
                        {{ $comment->user->name }}
                        <span style="float: right">
                            {{ $comment->updated_at }}
                        </span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $comment->comment }}</p>
                    </div>
                </div>
        </div>
        @endforeach
        <div class="col-sm-12 p-4">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
