<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();


        return view('states.index',compact('states'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('admin');
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

        return redirect(route('states.index'))->with('success', 'State created!');

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
        return view('states.show', compact('state'));
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
        return view('states.edit',compact('state'));
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

        State::where('id', $state['id'])->update($this->validateState());

        //$state->state = request('state');
        //$state->save();

        return redirect(route('states.show', $state))->with('success', 'State updated!');
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

        return redirect(route('states.index'))->with('success', 'State deleted!');

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
