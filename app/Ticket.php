<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{

    use SoftDeletes;

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

    public static function boot()
    {
        parent::boot();
        static::deleted(function($ticket)
        {
            $ticket->comments()->delete();
        });
    }
}
