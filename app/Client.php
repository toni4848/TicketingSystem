<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public $timestamps = false;
    public $fillable = ['name', 'email','adress'];
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
