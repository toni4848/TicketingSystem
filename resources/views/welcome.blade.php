@extends('layout')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
            <div class="links">
                <h4 class="pb-2">States</h4>
                <a href="{{route('states.index')}}">States (GET/states)</a>
                <a href="{{route('states.create')}}">States (GET/states/create)</a>
                <h4 class="pb-2 pt-4">Clients</h4>
                <a href="{{route('clients.index')}}">Clients (GET/clients)</a>
                <a href="{{route('clients.create')}}">Clients (GET/clients/create)</a>
                <h4 class="pb-2 pt-4">Ticket</h4>
                <a href="/tickets">Tickets (GET/clients)</a>
                <a href="/tickets/create">Tickets (GET/tickets/create)</a>
            </div>
        </div>
    </div>
@endsection
