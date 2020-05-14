<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
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
}
