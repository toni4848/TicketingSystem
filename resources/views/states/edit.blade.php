@extends('layouts.layout')

@section('linked')
    <span><a href="{{route('states.index')}}">States</a></span>
    <span> / </span>
    <span><a href="{{route('states.show',$state)}}">State {{$state->id}} - {{$state->state}}</a></span>
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
                <h1 class="text-center">Edit State {{$state->id}}</h1>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-3"></div>
            <!-- Material input -->
            <div class="col-6">
                <form method="POST" action="{{route('states.update',$state)}}">
                    @csrf
                    @method('PUT')

                    <div class="md-form 2">
                        <i class="fas fa-cog prefix"></i>
                        <input type="text"
                               id="state"
                               name="state"
                               value="{{$state->state}}"
                               class="form-control @error('state') is-danger @enderror"
                               required>
                        <label for="state">State</label>

                        @error('state')
                        <p class="help is-danger">{{$errors->first('state')}}</p>
                        @enderror
                    </div>
                    <div class="text-center pt-2">
                    <button class="btn blue-gradient text-white " type="submit">Update State {{$state->id}}</button>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row pt-4 text-center">

        </div>
    </div>
    <div class="p-4"></div>

@endsection
