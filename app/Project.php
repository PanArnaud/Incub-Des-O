<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\City;
use App\Rate;
use App\Project;

class Project extends Model
{
	protected $fillable = [
        'title',
        'city_id',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function averageRate() 
    {
        $average = $this->rates()->avg('rate');
        return $average;
    }
}

