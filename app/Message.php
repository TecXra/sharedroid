<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [ 'to_number','message','primary_id','secondary_id','check'];





public function user()
    {
        return $this->belongsTo('App\User');

    }


}


