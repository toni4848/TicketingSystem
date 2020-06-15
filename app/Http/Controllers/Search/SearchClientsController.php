<?php

namespace App\Http\Controllers\Search;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->get('search');

        if ($search){
            $clients= Client::where('name','like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('adress', 'like', '%'.$search.'%')
                ->latest('created_at')
                ->paginate(10);
        }else{

            $clients = Client::latest('created_at')
                ->paginate(10);
        }
        return view ('clients.index', compact('clients'));
    }
}
