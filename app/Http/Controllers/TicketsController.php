<?php

namespace App\Http\Controllers;

use App\Client;
use App\Ticket;
use App\State;
use App\User;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::latest('created_at')->paginate(10);
        return view ('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * return \Illuminate\Http\Response
     */
    public function create($client=null)
    {
        $states =State::all();
        $users =User::all();
        if ($client){
            $client = Client::findOrFail($client);
            return view('tickets.create',compact('states','users','client'));
        }else{
            $clients =Client::all();
            $client=null;
            return view('tickets.create',compact('states','users','clients','client'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validateTicket();

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'state_id' => $request->input('state'),
            'client_id' => $request->input('client'),
            'user_id' => $request->input('user')
        ]);

        $ticket->save();
        //Ticket::create($this->validateTicket());
        return redirect(route('tickets.index'))->with('success', 'Ticket created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $states =State::all();
        $users =User::all();
        $clients =Client::all();
        return view('tickets.edit',compact('ticket','states','users','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * param  \App\Ticket  $ticket
     * return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $ticket = Ticket::findOrFail($id);

        $this->validateTicket();

        $ticket->body = request('title');
        $ticket->body = request('body');
        $ticket->state_id = request('state');
        $ticket->user_id = request('user');
        $ticket->client_id = request('client');
        $ticket->save();
        //$ticket->update($this->validateTicket());
        return redirect(route('tickets.show',$ticket))->with('success', 'Ticket updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect(route('tickets.index'))->with('success', 'Ticket deleted!');
    }

    public function  userTickets(){

        $tickets = Ticket::where('user_id');
        return view ('tickets.index', compact('tickets'));

    }

    public function  validateTicket(){
        return request()->validate([
            'title'=>'required|max: 45',
            'body'=>'required|max: 255',
            'state'=>'required',
            'user'=>'required',
            'client'=>'required'
        ]);
    }

}
