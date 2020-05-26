@extends('layout')

@section('linked')
    <span><a href="{{route('states.index')}}"> States</a></span>
@endsection

@section('button')
    <form class="d-flex justify-content-center">
        <!-- Default input -->
        <input type="search" placeholder="Search state" aria-label="Search" class="form-control">
        <button class="btn peach-gradient btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <a class="text-white d-flex" href="{{route('states.create')}}">
        <button class="btn blue-gradient btn-sm my-0 p">Create</button>
    </a>
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>States (GET/states)</h1>
            </div>
        </div>
        <div>
            @if ($states->isEmpty())
                <p>There are currently no states.</p>
            @else

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">State</th>
                        <th scope="col" class="text-center">/states/{state}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($states as $state)
                        <tr>
                            <td class="text-center">{{$state->id}}</td>
                            <td class="text-center">{{$state->state}}</td>
                            <td class="text-center">
                                <a class="text-white text-center" href="{{route('states.show', $state)}}">
                                    <button type="button" class="btn btn-indigo btn-sm m-0 text-center">View</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <a class="text-white" href="/">
            <button class="btn peach-gradient">Početna</button>
        </a>
        <a class="text-white" href="{{route('states.create')}}">
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
    <div class="p-2"></div>

@endsection
