<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class State extends Model
{

    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['tickets'];

    public $timestamps = false;
    protected $fillable = ['state'];
    //protected $guarded = [];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
