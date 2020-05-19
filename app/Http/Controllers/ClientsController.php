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
        $clients = Client::all();


        return view('clients.index',['clients'=>$clients]);
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

        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

        return view('clients.show', ['client'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {

        return view('clients.edit',['client'=>$client]);
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

        return redirect('/clients/'.$client->id)->with('Success', 'Client updated!');
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

        return redirect('/clients')->with('Success', 'Client deleted!');
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
