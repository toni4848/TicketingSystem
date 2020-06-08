@extends('layouts.layout')

@section('linked')
    <span><a href="{{route('states.create')}}">Create State</a></span>
@endsection

@section('button')
    <a class="text-white d-flex" href="/">
        <button class="btn peach-gradient btn-sm my-0 p">Home</button>
    </a>
@endsection

@section('content')

<div class="container p-5">
    <div class="row">
        <div class="col align-self-center">
            <h1 class="text-center">Create State</h1>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-3"></div>
            <!-- Material input -->
            <div class="col-6">
                <form method="POST" action="{{route('states.store')}}">
                    @csrf

                    <div class="md-form 2">
                        <i class="fas fa-cog prefix"></i>
                        <input type="text"
                               id="state"
                               name="state"
                               class="form-control @error('state') is-danger @enderror"
                               required
                               value="{{old('state')}}">
                        <label for="state">State</label>

                        @error('state')
                        <p class="help is-danger">{{$errors->first('state')}}</p>
                        @enderror
                    </div>
                    <div class="text-center pt-2">
                    <button class="btn blue-gradient text-white text-center " type="submit">Store State</button>
                    </div>
                </form>
            </div>
        <div class="col-3"></div>
    </div>
    <div class="row pt-4 ">
    </div>
</div>



@endsection
