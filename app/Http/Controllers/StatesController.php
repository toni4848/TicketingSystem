<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();


        return view('states.index',['states'=>$states]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //die("bok");
        return view('states.create');
    }

    /**
     * Store a newly created resource in storage.
     *  @param  \Illuminate\Http\Request  $request
     *  return \Illuminate\Http\Response
     */
    public function store()
    {

        //$state = new State();
        //$state->state = request('state');
        //$state->save();

        State::create($this->validateState());

        return redirect('/states');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //$state = State::findOrFail($id);
        //return $state;
        return view('states.show', ['state'=>$state]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //$state = State::findOrFail($id);
        return view('states.edit',['state'=>$state]);
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * return \Illuminate\Http\Response
     */
    public function update(State $state)
    {
        //$state = State::findOrFail($id);

        $state->update($this->validateState());

        //$state->state = request('state');
        //$state->save();

        return redirect('/states/'.$state->id)->with('Success', 'State updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //die("bok");
        //$state = State::findOrFail($id);
        $state->delete();

        return redirect('/states')->with('success', 'State deleted!');

    }

    /**
     * @return array
     */
    public function validateState(): array
    {
        return request()->validate([
            'state' => ['required', 'max:45']
        ]);
    }
}
