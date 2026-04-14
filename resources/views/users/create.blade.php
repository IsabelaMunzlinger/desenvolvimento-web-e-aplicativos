<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<link rel="shortcut icon" type="image/png" href="{{ asset('css/favicon/telefone.png') }}">
    
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Cadastrar Novo Usuário</h4>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="/users/store">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Digite o nome completo" />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input name="email" id="email" type="email" class="form-control" placeholder="exemplo@email.com" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input name="password" id="password" type="password" class="form-control" placeholder="Mínimo de 8 caracteres" />
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="/users" class="btn btn-outline-secondary">Voltar</a>
                                <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3 shadow-sm"> 
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
    
</body>
</html>