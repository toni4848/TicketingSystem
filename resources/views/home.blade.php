@extends('layouts.layout')

@section('nav')
    <a>You are logged in as {{auth()->user()->username}}</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1 class="text-center">Welcome to Ticket System</h1>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        </div>
</div>
@endsection


