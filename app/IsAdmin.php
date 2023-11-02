<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IsAdmin extends Model
{
    //protected fillable
    protected $fillable = [
        'user_id'
    ];
    
    //belongs to user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
