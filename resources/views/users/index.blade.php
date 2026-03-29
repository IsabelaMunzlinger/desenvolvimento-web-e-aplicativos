<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Gerenciar Usuários</h2>
            <a href="/users/create" class="btn btn-primary shadow-sm">+ Novo Usuário</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0"> <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th class="text-end pe-4">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="ps-4">{{$user->id}}</td>
                                <td><strong>{{$user->name}}</strong></td>
                                <td>{{$user->email}}</td>
                                
                                <td class="text-end pe-4">
                                    <a href="/users/{{$user->id}}" class="btn btn-sm btn-outline-primary me-1">
                                        Editar
                                    </a>
                                    <a href="/users/{{$user->id}}/delete" class="btn btn-sm btn-outline-danger">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</body>
</html>