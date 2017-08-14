<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}