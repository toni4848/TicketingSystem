@extends('layout')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>Client (GET/clients/{client})</h1>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Edit (GET/clients/{client}/edit</th>
                <th scope="col">Delete (DELETE/clients/{client}</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->adress}}</td>
                    <td>
                        <a class="text-white" href="/clients/{{$client->id}}/edit">
                            <button type="button" class="btn btn-green btn-sm m-0">Edit</button>
                        </a>
                    </td>
                    <td>

                        <form method="POST" action="/clients/{{$client->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-red btn-sm m-0">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <a class="text-white" href="/">
            <button class="btn peach-gradient">Početna</button>
        </a>
        <div class="col-sm-12 p-4">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
