@extends('layout')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col align-self-center">
            <h1>Create user</h1>
        </div>
    </div>
    <div class="row pt-5 pl-5">
        <div class="col-3"></div>
            <div class="col-6">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="md-form 2">
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control @error('name') is-danger @enderror"
                               required
                               value="{{ old('name') }}">
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
                               value="{{ old('username') }}">
                        <label for="username">Userame</label>

                        @error('username')
                            <p class="help is-danger">{{ $errors->first('username') }}</p>
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

                    <button class="btn blue-gradient text-white " type="submit">Save</button>

                </form>
            </div>
        <div class="col-3"></div>
    </div>
    <div class="row pt-4">
        <div class="col-3"></div>
            <div class="col-3 pl-5">
                <a class="text-white" href="/">
                    <button class="btn peach-gradient">Početna</button>
                </a>
            </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection