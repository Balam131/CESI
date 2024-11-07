<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Responsables</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body class="font-sans antialiased">
    <main class="container">
        <h1 class="text-center">Responsables</h1>
        <div class="mb-4 d-flex justify-content-center align-items-center">
            <form action="{{ route('responsables.index') }}" method="GET" class="d-flex align-items-center me-2">
                <input type="text" name="nombre" placeholder="Buscar por nombre" class="form-control me-2"
                    style="max-width: 200px;" value="{{ request('nombre') }}">
                <button type="submit" class="btn btn-primary btn-sm me-2">Buscar</button>
            </form>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Tutor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responsables as $responsable)
                    <tr>
                        <td>{{ $responsable->responsable_nombre }}</td>
                        <td>{{ $responsable->responsable_telefono }}</td>
                        <td>{{ $responsable->responsable_usuario }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $responsable->responsable_foto) }}" alt=""
                                width="50px" height="50px" class="me-2">
                        </td>
                        <td>
                            <!-- Mostrar el nombre del tutor relacionado -->
                            {{ $responsable->tutores->tutor_nombre }}
                        </td>
                        <td>
                            <!-- Botón Editar -->
                            <a href="{{ route('responsables.edit', $responsable) }}"
                                class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>
