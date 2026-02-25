<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\User;
=======
use App\Models\User;
use Illuminate\Http\Request;
>>>>>>> 8f58308b9a139a16ab6fc7438418609a21ee65ca
use Illuminate\View\View;

class UserController extends Controller
{
<<<<<<< HEAD
    public function index () : View
    {
        return view('users', [ #nome da view é index
            'users' => User::all() #colocar todas as consultas do banco no objeto user, usando all(), depois acessa na View Index
=======
    /**
     * Index.
     */
    public function index(): View
    {
        return view('users', [
            'users' => User::all()
>>>>>>> 8f58308b9a139a16ab6fc7438418609a21ee65ca
        ]);
    }
}
