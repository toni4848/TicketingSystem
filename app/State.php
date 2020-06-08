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

    public static function boot()
    {
        parent::boot();
        static::deleted(function($state)
        {
            foreach ($state->tickets()->get() as $ticket) {
                $ticket->delete();
              }
        });
    }
}
