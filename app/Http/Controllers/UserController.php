<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index () : View
    {
        return view('users', [ #nome da view é index
            'users' => User::all() #colocar todas as consultas do banco no objeto user, usando all(), depois acessa na View Index
        ]);
    }
}
