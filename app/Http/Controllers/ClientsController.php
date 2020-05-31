<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest('created_at')->paginate(10);


        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store()
    {
        Client::create($this->validateAttributes());

        return redirect(route('clients.index'))->with('success', 'Client created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {

        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * return \Illuminate\Http\Response
     */
    public function update(Client $client)
    {

        $client->update($this->validateAttributes());

        return redirect(route('clients.show',$client))->with('success', 'Client updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {

        $client->delete();

        return redirect(route('clients.index'))->with('success', 'Client deleted!');
    }

    /**
     * @return array
     */
    public function validateAttributes(): array
    {
        return request()->validate([
            'name' => ['required', 'max:45'],
            'email' => ['required', 'max:80'],
            'adress' => ['required', 'max:80']
        ]);
    }
}
