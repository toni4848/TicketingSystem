<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps = false;
    protected $fillable = ['state'];
    //protected $guarded = [];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
