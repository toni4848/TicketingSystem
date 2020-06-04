<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Ticket extends Model
{

    use SoftDeletes, CascadeSoftDeletes;
    protected $cascadeDeletes = ['comments'];

    protected $guarded = [];

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
