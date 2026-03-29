<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

#Classe route - método get - (um parâmetro /, para a função anônima) - função anônima que retorna a view welcome
Route::get('/', function () {
    return view('welcome'); #retorna a view welcome, que é a página inicial do Laravel
});


Route::get('/greeting', function () {
    return view ('hello'); 
});

#Quando acessar a rota /users, o método index do UserController será executado, que retorna a view users com os dados dos usuários do banco de dados.
Route::get('/users', [UserController::class, 'index']); //Index é o nome do método do controller
Route::get('users/create', [UserController::class, 'create']); //método create para exibir o formulário de criação de usuário
Route::post('users/store', [UserController::class, 'store']); //método store para salvar o novo usuário no banco de dados
Route::get('users/{user}', [UserController::class, 'edit']); //método show para exibir os detalhes de um usuário específico
Route::put('users/{user}', [UserController::class, 'update']); //método show para exibir os detalhes de um usuário específico
Route::get('users/{user}/delete', [UserController::class, 'confirmDelete']); //método edit para exibir o formulário de edição de um usuário específico 
Route::delete('users/{user}', [UserController::class, 'delete']); //método destroy para excluir um usuário específico

Route::get('users/{user}/phone', [UserController::class, 'createPhone']);
Route::post('users/{user}/phone', [UserController::class, 'storePhone']); //método store para salvar o novo usuário no banco de dados
Route::delete('users/{user}/phone/{phone}', [UserController::class, 'deletePhone']); //método store para salvar o novo usuário no banco de dados
