@extends('layouts.layout')

@section('linked')
    <span><a href="{{route('comments.index')}}">Comments</a></span><span> / </span>
    <span>Comment {{$comment->id}}</span>
@endsection

@section('button')
    <a class="text-white d-flex" href="{{route('comments.create')}}">
        <button class="btn btn-primary btn-sm my-0 p">Create Comment</button>
    </a>
    <a class="text-white d-flex" href="{{route('home')}}">
        <button class="btn btn-amber btn-sm my-0 p">Home</button>
    </a>
@endsection

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>Comment {{$comment->id}}</h1>
            </div>
        </div>
        <div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col" class="text-center">Comment</th>
                    <th scope="col" class="text-center">Ticket</th>
                    <th scope="col" class="text-center">Created at</th>
                    <th scope="col" class="text-center">Updated at</th>
                    <th scope="col" class="text-center">Edit</th>
                    <th scope="col" class="text-center">Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">{{$comment->id}}</td>
                    <td class="text-center">{{$comment->ticket_id}}</td>
                    <td class="text-center">{{$comment->created_at}}</td>
                    <td class="text-center">{{$comment->updated_at}}</td>
                    <td class="text-center">
                        @can('update',$comment)
                            <a class="text-white" href="{{route('comments.edit',$comment->id)}}">
                                <button type="button" class="btn btn-light-green btn-sm m-0">Edit</button>
                            </a>
                        @else
                            <a class="text-center">Forbidden</a>
                        @endcan
                    </td>
                    <td class="text-center">
                        @can('delete',$comment)
                            <form method="POST" action="{{route('comments.destroy',$comment->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn red lighten-1 text-white btn-sm m-0">Delete</button>
                            </form>
                        @else
                            <a class="text-center">Forbidden</a>
                        @endcan
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="p-4">
                <div class="card">
                    <h5 class="card-header h5">{{$comment->ticket->title}}</h5>
                    <div class="card-body">
                        <p class="card-text">{{$comment->ticket->body}}</p>
                    </div>
                </div>
                <div class="p-2"></div>
                <div class="card">
                    <h5 class="card-header h5">Comment {{$comment->id}}</h5>
                    <div class="card-body">
                        <p class="card-text">{{$comment->comment}}</p>
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
                                <h5 class="card-title">{{$comment->ticket->client->name}}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                User
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$comment->user->name}}</h5>
                                <p class="card-text">{{$comment->user->username}}</p>
                                <p class="card-text">{{$comment->user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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