<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukFeedback extends Model
{
    protected $fillable = [
        'produk_id', 'user_id', 'upvote', 'downvote', 'komentar'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Produk');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
