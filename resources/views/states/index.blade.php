@extends('layout')

@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>States (GET/states)</h1>
            </div>
        </div>
        <div>
            @if ($states->isEmpty())
                <p>There are currently no states.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">State</th>
                        <th scope="col">/states/{state}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($states as $state)
                        <tr>
                            <td>{{$state->id}}</td>
                            <td>{{$state->state}}</td>
                            <td>
                                <a class="text-white" href="/states/{{$state->id}}">
                                    <button type="button" class="btn btn-indigo btn-sm m-0">View</button>
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
        <a class="text-white" href="/states/create">
            <button class="btn blue-gradient">Create</button>
        </a>
        <div class="col-sm-12 mt-4">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>

@endsection
