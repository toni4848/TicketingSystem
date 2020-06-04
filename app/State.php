<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{

    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = ['state'];
    //protected $guarded = [];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
