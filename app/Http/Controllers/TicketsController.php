<?php

namespace App\Http\Controllers;

use App\Client;
use App\Ticket;
use App\State;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTicketRequest;

class TicketsController extends Controller
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
        $tickets = Ticket::userRole()->latest('created_at')->paginate(10);

        return view ('tickets.index', compact('tickets'));

    }

    public function searchTickets(Request $request){

        $search=$request->get('search');

        if ($search){
            $tickets= Ticket::userRole()->where('title','like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%')
                ->latest('created_at')
                ->paginate(10);
        }else{

            $tickets = Ticket::userRole()->latest('created_at')
                ->paginate(10);
        }
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

        if ($client){
            $client = Client::findOrFail($client);
            return view('tickets.create',compact('states','client'));
        }else{
            $clients =Client::all();
            $client=null;
            return view('tickets.create',compact('states','clients','client'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        Ticket::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'state_id' => $request['state'],
            'client_id' => $request['client'],
            'user_id' => auth()->user()->id
        ]);

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
        $this->authorize('update', $ticket);
        $states =State::all();
        $clients =Client::all();
        return view('tickets.edit',compact('ticket','states','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * param  \App\Ticket  $ticket
     * return \Illuminate\Http\Response
     */
    public function update(Ticket $ticket, StoreTicketRequest $request)
    {
        //$this->authorize('update-ticket', $ticket);
        $this->authorize('update', $ticket);

        Ticket::where('id', $ticket['id'])->update([
            'title' => $request['title'],
            'body' => $request['body'],
            'state_id' => $request['state'],
            'client_id' => $request['client'],
            'user_id' => auth()->user()->id
        ]);
 
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
        //$this->authorize('update-ticket', $ticket);
        $this->authorize('delete', $ticket);
        $ticket->delete();
        return redirect(route('tickets.index'))->with('success', 'Ticket deleted!');
    }
}
