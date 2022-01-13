<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
	//to display the data for the user
    public function profile()
    {
    	return view('user-profile')->with('user', auth()->user());
    }
}
