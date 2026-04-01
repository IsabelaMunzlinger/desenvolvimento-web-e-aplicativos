<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Telefone</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Adicionar Novo Telefone</h4>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="/users/{{$user->id}}/phone">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="number" class="form-label">Número do Telefone</label>
                                <input name="number" id="number" type="text" class="form-control" placeholder="(00) 00000-0000" />
                            
                                <script src="https://unpkg.com/imask"></script>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        var phoneInput = document.getElementById('number');
                                        
                                        var maskOptions = {
                                            mask: '(00) 00000-0000'
                                        };
                                        
                                        var mask = IMask(phoneInput, maskOptions);
                                    });
                                </script>
                            
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="/users/{{$user->id}}" class="btn btn-outline-secondary">Voltar</a>
                                <button type="submit" class="btn btn-success">Salvar Telefone</button>
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