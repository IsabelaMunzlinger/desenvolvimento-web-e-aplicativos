<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUÁRIOS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1>
        EDITAR USUÁRIOS
    </h1>

    <form method="POST" action="/users/{{$user->id}}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">
                Nome
            </label>
            <input
                type="text"
                class="form-control"
                name="name"
                value="{{$user->name}}"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">
                E-mail
            </label>
            <input
                type="email"
                class="form-control"
                name="email"
                value="{{$user->email}}"
            >
        </div>

        <a href="/users/{{$USER->ID}}/phone" class="btn btn-primary">ADICONAR TELEFONE</a>
        <a href="/users" class="btn btn-secondary">VOLTAR</a>
        <button type="submit" class="btn btn-primary">ENVIAR</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3>Phones<h3>
                 <table class="table">
        <thead>
            <tr>
                <th>Número</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->phones as $phone)
            <tr>
                <td>{{$phone->telefone}}</td>
                <td>
                    <a
                        href="/users/{{$user->id}}/phone/{{$phone_id}}"
                        class="btn btn-danger"
                    >
                        EXCLUIR
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
</body>
</html>