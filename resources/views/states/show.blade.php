@extends('layouts.layout')

@section('linked')
    <span><a href="{{route('states.index')}}">States</a></span><span> / </span><span>State {{$state->id}} - {{$state->state}}</span>
@endsection

@section('button')
    @can('admin')
    <a class="text-white d-flex" href="{{route('states.create')}}">
        <button class="btn btn-primary btn-sm my-0 p">Create State</button>
    </a>
    @endcan
    <a class="text-white d-flex" href="{{route('home')}}">
        <button class="btn btn-amber btn-sm my-0 p">Home</button>
    </a>
@endsection

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>State (id = {{$state->id}})</h1>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col" class="text-center">State</th>
                <th scope="col" class="text-center">Edit </th>
                <th scope="col" class="text-center">Delete </th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">{{$state->state}}</td>
                    <td class="text-center">
                        @can('admin')
                        <a class="text-white" href="{{route('states.edit',$state)}}">
                            <button type="button" class="btn btn-light-green btn-sm m-0">Edit</button>
                        </a>
                        @else
                            <a class="text-center">Forbidden</a>
                        @endcan
                    </td>
                    <td class="text-center">
                        @can('admin',$state)
                        <form method="POST" action="{{route('states.destroy',$state)}}">
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
        <div class="col-sm-12 p-4">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
