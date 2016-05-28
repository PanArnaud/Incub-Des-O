<?php

namespace App;

use App\Projet;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username', 'email', 'first_name', 'last_name' ,'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function getFullName() 
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function projects()
    {
        return $this->hasMany(Projet::class);
    }
}
