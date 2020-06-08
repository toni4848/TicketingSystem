@extends('layouts.layout')

@section('linked')
    <span><a href="{{route('tickets.create')}}">Create Ticket</a></span>
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
                <h1 class="text-center">Create Ticket @if($client!=null)for Client {{$client->name}}@endif</h1>
            </div>
        </div>
        <div class="row pt-5 ">
            <div class="col-3"></div>
            <!-- Material input -->
            <div class="col-6">
                <form method="POST" action="{{route('tickets.store')}}">
                    @csrf

                    <div class="md-form 2">
                        <i class="fas fa-cog prefix"></i>
                        <input type="text"
                               id="title"
                               name="title"
                               class="form-control @error('title') is-danger @enderror"
                               required
                               value="{{old('title')}}">
                        <label for="title">Title</label>

                        @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                    <div class="md-form">
                        <i class="fas fa-pencil-alt prefix"></i>
                        <textarea id="body"
                                  name="body"
                                  class="md-textarea form-control @error('body') is-danger @enderror"
                                  required
                                  value="{{old('body')}}"
                                  rows="4"></textarea>
                        <label for="body">Body</label>

                        @error('body')
                        <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
                    </div>

                    <div class="md-form">
                        <select id="state"
                                class="browser-default custom-select m-2"
                                name="state">
                            <option value="">State</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('state'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="md-form">
                        <select id="client"
                                class="browser-default custom-select m-2"
                                name="client">
                            @if($client==null)
                            <option value="">Client</option>
                                @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                                @else
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endif
                        </select>
                        @if ($errors->has('client'))
                            <span class="help-block">
                                <strong>{{ $errors->first('client') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="text-center pt-2">
                    <button class="btn blue-gradient text-white " type="submit">Store Ticket</button>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row pt-4">
        </div>
    </div>

@endsection
