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

        // Validar informações (email, nome, senha) - validar assim que chamar a requisição

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            //ou assim também required|string|email|max:255|unique:users
            'password' => ['required', 'string', 'min:8']],
            ['name.required' => 'O campo nome é obrigatório.']);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        
        return redirect('/users');
    }
    /**
     * Edit.
     */

    public function edit(Request $request, User $user): View
    { 
        $user->load('phones');

        return view('users.edit', [
            'user' => $user
        ]);
    }



    public function update(Request $request, User $user): RedirectResponse
    {

        // Validar informações (email, nome, senha) - validar assim que chamar a requisição

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required|string|email|max:255|unique:email,id,' . $user->id],
            //ou assim também required|string|email|max:255|unique:users
            'password' => ['required', 'string', 'min:8']],
            ['name.required' => 'O campo nome é obrigatório.',
            'email.unique' => 'O email já está em uso por outro usuário.']);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        
        return redirect('/users');
    }

/**
     * Cofirm delete.
     */
    public function confirmDelete(Request $request, User $user): View
    { 
        return view('users.delete', [
            'user' => $user
        ]);
    }

    /**
     * Delete.
     */
    public function delete(Request $request, User $user): RedirectResponse
    { 
        $user->delete();
 
        return redirect('/users');
    }


     /**
     * Criar telefone
     */
    public function createPhone(Request $request, User $user) : View
    {
        return view('users.phones.create', [
                        'user'=> $user]
        ); //forma de organização das views

    }

}
