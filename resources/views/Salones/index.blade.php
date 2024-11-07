<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Salones</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="font-sans antialiased">
    <main class="container">
        <h1 class="text-center">Salones</h1>
        <div class="mb-4 d-flex justify-content-center align-items-center">
            <form action="{{ route('salones.index') }}" method="GET" class="d-flex align-items-center me-2">
                <input type="text" name="grado" placeholder="Buscar por grado" class="form-control me-2"
                    style="max-width: 150px;" value="{{ request('grado') }}">
                <input type="text" name="grupo" placeholder="Buscar por grupo" class="form-control me-2"
                    style="max-width: 150px;" value="{{ request('grupo') }}">
                <button type="submit" class="btn btn-primary btn-sm me-2">Buscar</button>
            </form>

            <a href="{{ route('salones.create') }}" class="shadow btn btn-sm btn-primary d-flex align-items-center"
                style="background-color: #4CAF50; color: white; border-radius: 5px; padding: 5px 10px; font-size: 0.9em;">
                <img src="{{ asset('Sources/anadir.png') }}" alt="Agregar Salón" width="20px" height="20px"
                    class="me-1">
                Crear Nuevo Salón
            </a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Escuela</th>
                    <th>Maestro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salones as $salon)
                    <tr>
                        <td>{{ $salon->salon_grado }}</td>
                        <td>{{ $salon->salon_grupo }}</td>
                        <td>{{ $salon->escuelas->escuela_nombre }}</td>
                        <td>{{ $salon->maestros->maestro_nombre }}</td>
                        <td>
                            <a href="{{ route('salones.edit', $salon->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('salones.destroy', $salon->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este salón?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>
