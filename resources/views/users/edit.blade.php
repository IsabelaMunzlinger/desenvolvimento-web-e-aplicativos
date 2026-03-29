<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Editar Perfil</h4>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="/users/{{$user->id}}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nome</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">E-mail</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="/users" class="btn btn-outline-secondary">Voltar</a>
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger shadow-sm mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Telefones Cadastrados</h5>
                        <a href="/users/{{$user->id}}/phone" class="btn btn-sm btn-success">+ Adicionar Telefone</a>
                    </div>
                    
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">Número</th>
                                        <th class="text-end pe-4">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->phones as $phone)
                                    <tr>
                                        <td class="ps-4">{{$phone->number}}</td>
                                        <td class="text-end pe-4">
                                            <form action="/users/{{$user->id}}/phone/{{$phone->id}}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>