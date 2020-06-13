<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SearchUsersController extends Controller
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
            $users= User::where('name','like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('username', 'like', '%'.$search.'%')
                ->latest('created_at')
                ->paginate(10);
        }else{

            $users = User::latest('created_at')
                ->paginate(10);
        }
        return view ('users.index', compact('users'));
    }
}
