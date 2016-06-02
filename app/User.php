<?php

namespace App;

use App\Project;
use App\Rate;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use EntrustUserTrait;

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

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
