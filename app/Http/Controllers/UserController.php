<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index() : View
    {
        return view('users.index', [ #nome da view é index
            'users' => User::all() #colocar todas as consultas do banco no objeto user, usando all(), depois acessa na View Index

        ]);
    }


    public function create() : View
    {
        return view('users.create');
    }

    //Para salvar o novo usuário no banco de dados, o método store recebe um objeto Request como parâmetro, que contém os dados do formulário enviado pelo usuário. O método então extrai o nome do usuário do objeto Request e armazena o novo usuário no banco de dados (a lógica de armazenamento não está implementada neste exemplo). Por fim, o método redireciona o usuário de volta para a página de listagem de usuários (/users).
    public function store(Request $request): RedirectResponse
    {

        // Validar informações (email, nome, senha)

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        
        return redirect('/users');
    }
}
