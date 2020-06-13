<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;

class SearchTicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->get('search');

        if ($search){
            $tickets= Ticket::where('title','like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%')
                ->latest('created_at')
                ->paginate(10);
        }else{

            $tickets = Ticket::latest('created_at')
                ->paginate(10);
        }
        return view ('tickets.index', compact('tickets'));
    }

}
