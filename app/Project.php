<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\City;

class Project extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

