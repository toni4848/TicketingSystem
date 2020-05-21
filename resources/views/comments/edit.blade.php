@extends('layout')

@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col align-self-center">
            <h1>State (GET/states/{state}/edit)</h1>
        </div>
    </div>
    <div class="row pt-5 pl-5">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="/comments/{{ $comment->id }}">
                @csrf
                @method('PUT')

                <div class="md-form 2">
                    <textarea id="comment"
                    name="comment"
                    class="md-textarea md-textarea-auto form-control
                    @error('comment') is-danger @enderror"
                    style="resize: none"
                    rows="4"
                    cols="50">{{ $comment->comment }}</textarea>
                    <label for="comment">Comment</label>

                    @error('state')
                        <p class="help is-danger">{{$errors->first('comment')}}</p>
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