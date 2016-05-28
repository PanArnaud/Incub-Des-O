<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class UserController extends Controller
{
    public function profile($username, User $user) 
    {
    	$find = $user->where('username', $username)->first();

    	if (!$find) {
    		return abort(404);
    	}

    	dd($find);
    }
}
