@extends('layout')

@section('content')

    <div class="container pt-5">
        <div class="row">
            <div class="col align-self-center">
                <h1>Client (GET/clients/{client}/edit)</h1>
            </div>
        </div>
        <div class="row pt-5 pl-5">
            <div class="col-3"></div>
            <!-- Material input -->
            <div class="col-6">
                <form method="POST" action="{{route('clients.update',$client)}}">
                    @csrf
                    @method('PUT')

                    <div class="md-form 2">
                        <i class="fas fa-cog prefix"></i>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{$client->name}}"
                               class="form-control @error('name') is-danger @enderror"
                               required>
                        <label for="name">Name</label>

                        @error('name')
                        <p class="help is-danger">{{$errors->first('name')}}</p>
                        @enderror
                    </div>
                    <div class="md-form 2">
                        <i class="fas fa-at prefix"></i>
                        <input type="text"
                               id="email"
                               name="email"
                               value="{{$client->email}}"
                               class="form-control @error('email') is-danger @enderror"
                               required>
                        <label for="email">Email</label>

                        @error('email')
                        <p class="help is-danger">{{$errors->first('email')}}</p>
                        @enderror
                    </div>
                    <div class="md-form 2">
                        <i class="fas fa-address-card prefix"></i>
                        <input type="text"
                               id="adress"
                               name="adress"
                               value="{{$client->adress}}"
                               class="form-control @error('adress') is-danger @enderror"
                               required>
                        <label for="adress">Adress</label>

                        @error('adress')
                        <p class="help is-danger">{{$errors->first('adress')}}</p>
                        @enderror
                    </div>
                    <button class="btn blue-gradient text-white " type="submit">Edit (PUT/Clients/{client})</button>
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
