<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\Phone;

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
            'email' => ['required','string','email','max:255', 'unique:users,email,' . $user->id],
        ],
            ['name.required' => 'O campo nome é obrigatório.',
            'email.unique' => 'O email já está em uso por outro usuário.'
            ]);
        
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

    /*
        public function createPhone(Request $request, User $user) : View
    {
        $user->phones()->create([
            'number' => $request->number //vem do input do formulário de nome number
        ]);

    }*/

    /**
     * Salvar o telefone no banco de dados
     */
    public function storePhone(Request $request, User $user): RedirectResponse //responsta de redirecionamento; grava no banco e volta na tabela de phones
    {
        // 1. Validar se o usuário digitou o número
        $request->validate([
            'number' => 'required|string|max:20|unique:phones,number',
        ],
        [
        'number.required' => 'O campo número é obrigatório.',
        'number.size' => 'O campo número deve conter no máximo 20 caracteres.',
        'number.unique' => 'O número já existe.'
        ]
        );

        // 2. Salvar o telefone usando a relação do usuário
        $user->phones()->create([
            'number' => $request->number,
        ]);

        // 3. Redirecionar de volta para a tela de edição do usuário
        return redirect('/users/' . $user->id); 
    }

    public function deletePhone(Request $request, User $user, Phone $phone): RedirectResponse
            { 
                // 1. Exclui o registro do banco de dados
                $phone->delete();
        
                // 2. Redireciona de volta para a tela de edição daquele usuário específico
                return redirect('/users/' . $user->id); 
            }

    public function deletePhones(Request $request, User $user): RedirectResponse
    {
        $user->phones()->delete();

        return redirect('/users/' . $user->id);
    }


}
