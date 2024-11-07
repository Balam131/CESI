<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Maestros</title>

    <!-- Fonts -->
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

    <main>
        <h3>
            Editar maestro <i> {{ $maestro->maestro_nombre }}</i>
        </h3>
        <form action="{{ route('maestros.update', $maestro->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12">
                    <label for="InputNombre" class="form-label">* Nombre de Maestro</label>
                    <input type="text" name="maestro_nombre" id="InputNombre" class="form-control" placeholder="..."
                        value="{{ old('maestro_nombre', $maestro->maestro_nombre) }}">
                </div>
                <div class="col-sm-4">
                    <label for="InputUsuario" class="form-label">Usuario</label>
                    <input type="email" name="maestro_usuario" id="InputUsuario" class="form-control"
                        placeholder="..." value="{{ old('maestro_usuario', $maestro->maestro_usuario) }}">

                </div>

                <div class="col-sm-4">
                    <label for="InputPassword" class="form-label">Contraseña</label>
                    <input type="password" name="maestro_contraseña" id="InputPassword" class="form-control"
                        placeholder="..." value="{{ old('maestro_contraseña', $maestro->maestro_contraseña) }}">

                </div>

                <div class="col-sm-4">
                    <label for="InputTelefono" class="form-label">Telefono</label>
                    <input type="tel" name="maestro_telefono" id="InputTelefono" class="form-control"
                        placeholder="..." value="{{ old('maestro_telefono', $maestro->maestro_telefono) }}">

                </div>

                <div class="col-sm-4">
                    <label for="InputFoto" class="form-label">Foto del Maestro</label>
                    <input type="file" name="maestro_foto" id="InputFoto" class="form-control" accept="image/*"
                        value="{{ old('maestro_foto', $maestro->maestro_foto) }}">

                </div>

                <div class="my-2 col-sm-12 text-end">
                    <button type="submit" class="btn btn-primary">
                        Editar
                    </button>

                </div>
            </div>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>

</body>
