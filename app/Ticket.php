<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = ['title','body','user_id','state_id','client_id'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeUserRole($query)
    {
        $usersRole=auth()->user()->role;
        $user=auth()->user()->id;
        if ($usersRole != 'admin'){
            return $query->where('user_id', $user);
        }
    }
}
