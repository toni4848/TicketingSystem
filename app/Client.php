<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Client extends Model
{

    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['tickets'];

    public $fillable = ['name', 'email','adress'];
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
