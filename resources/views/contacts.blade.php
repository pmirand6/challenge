<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Pagination Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Waynimovil Challenge</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-success">
            <th scope="col">Nombres</th>
            <th scope="col">Email</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Notas</th>
        </tr>
        </thead>
        <tbody>
        @if(empty($contacts))
            <tr>
                <td colspan="4">Sin Resultados</td>
            </tr>
        @endif
        @foreach($contacts as $data)
            <tr>
                <td>{{ $data['names'] }}</td>
                <td>{{ $data['email'] }}</td>
                <td>{{ $data['phone'] }}</td>
                <td>{{ $data['notes'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
