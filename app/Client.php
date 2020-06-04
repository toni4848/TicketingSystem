<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use SoftDeletes;
    public $fillable = ['name', 'email','adress'];
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
