@extends('layouts.layout')

@section('linked')
    <span><a href="{{route('users.index')}}">Users</a></span>
    <span> / </span>
    <span><a href="{{route('users.show',$user)}}">User {{$user->id}}</a></span>
    <span> / </span>
    <span>Edit</span>
@endsection

@section('button')
    <a class="text-white d-flex" href="/">
        <button class="btn peach-gradient btn-sm my-0 p">Home</button>
    </a>
@endsection

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col align-self-center">
            <h1 class="text-center">Edit User {{$user->id}}</h1>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-3"></div>
            <div class="col-6">
                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <div class="md-form 2">
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control @error('name') is-danger @enderror"
                               required
                               value="{{ $user->name }}">
                        <label for="name">Name</label>

                        @error('name')
                            <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @enderror
                    </div>

                    <div class="md-form 2">
                        <input type="text"
                               id="username"
                               name="username"
                               class="form-control @error('username') is-danger @enderror"
                               required
                               value="{{ $user->username }}">
                        <label for="username">Userame</label>

                        @error('username')
                            <p class="help is-danger">{{ $errors->first('username') }}</p>
                        @enderror
                    </div>

                    <div class="md-form 2">
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{$user->email}}"
                               class="form-control @error('email') is-danger @enderror"
                               required
                               autocomplete="email" autofocus>
                        <label for="email">Email</label>

                        @error('email')
                        <p class="help is-danger">{{$errors->first('email')}}</p>
                        @enderror
                    </div>

                    <div class="md-form 2">
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control @error('password') is-danger @enderror"
                               required>
                        <label for="password">Password</label>

                        @error('password')
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @enderror
                    </div>
                    <div class="text-center pt-2">
                    <button class="btn blue-gradient text-white " type="submit">Update User {{$user->id}}</button>
                    </div>
                </form>
            </div>
        <div class="col-3"></div>
    </div>
    <div class="row pt-4">
    </div>
</div>
@endsection