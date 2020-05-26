@extends('layout')

@section('linked')
    <span><a href="{{route('states.index')}}">States</a></span><span> / </span><span>State {{$state->id}} - {{$state->state}}</span>
@endsection

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>State (GET/states/{state})</h1>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">State</th>
                <th scope="col">Edit (GET/states/{state}/edit</th>
                <th scope="col">Delete (DELETE/states/{state}</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$state->state}}</td>
                    <td>
                        <a class="text-white" href="{{route('states.edit',$state)}}">
                            <button type="button" class="btn btn-green btn-sm m-0">Edit</button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('states.destroy',$state)}}">
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
