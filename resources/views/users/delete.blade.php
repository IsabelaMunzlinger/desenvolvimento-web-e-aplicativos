<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card shadow-sm border-danger mb-4">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Confirmar Exclusão</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="alert alert-warning mb-4">
                            <strong>Atenção!</strong> Tem certeza que deseja excluir o usuário <strong>{{$user->name}}</strong>? Esta ação não poderá ser desfeita.
                        </div>

                        <form method="POST" action="/users/{{$user->id}}">
                            @csrf
                            @method('DELETE')
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">Nome</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" disabled />
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted">E-mail</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled />
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="/users" class="btn btn-outline-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Sim, Excluir Usuário</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger shadow-sm"> 
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