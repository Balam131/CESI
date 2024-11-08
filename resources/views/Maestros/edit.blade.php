<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Editar Maestro</title>

    <!-- Fonts and Styles -->
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

    <div class="container mt-4">
        <main>
            <h3>
                Editar maestro <i>{{ $maestro->maestro_nombre }}</i>
            </h3>

            <form action="{{ route('maestros.update', $maestro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- Nombre de Maestro -->
                    <div class="col-sm-12">
                        <label for="InputNombre" class="form-label">* Nombre de Maestro</label>
                        <input type="text" name="maestro_nombre" id="InputNombre" class="form-control"
                            placeholder="Nombre del maestro"
                            value="{{ old('maestro_nombre', $maestro->maestro_nombre) }}">
                    </div>

                    <!-- Usuario -->
                    <div class="col-sm-4">
                        <label for="InputUsuario" class="form-label">Usuario (Email)</label>
                        <input type="email" name="maestro_usuario" id="InputUsuario" class="form-control"
                            placeholder="usuario@ejemplo.com"
                            value="{{ old('maestro_usuario', $maestro->maestro_usuario) }}">
                    </div>

                    <!-- Contraseña -->
                    <div class="col-sm-4">
                        <label for="InputPassword" class="form-label">Contraseña</label>
                        <input type="password" name="maestro_contraseña" id="InputPassword" class="form-control"
                            placeholder="Ingrese una nueva contraseña (dejar vacío si no desea cambiarla)">
                    </div>

                    <!-- Teléfono -->
                    <div class="col-sm-4">
                        <label for="InputTelefono" class="form-label">Teléfono</label>
                        <input type="tel" name="maestro_telefono" id="InputTelefono" class="form-control"
                            placeholder="Teléfono" value="{{ old('maestro_telefono', $maestro->maestro_telefono) }}">
                    </div>

                    <!-- Foto del Maestro -->
                    <div class="col-sm-12">
                        <label for="InputFoto" class="form-label">Foto del Maestro</label>
                        <input type="file" name="maestro_foto" id="InputFoto" class="form-control" accept="image/*">
                        @if ($maestro->maestro_foto)
                            <img src="{{ asset('storage/' . $maestro->maestro_foto) }}" alt="Foto actual del maestro"
                                class="mt-2 img-thumbnail" style="width: 150px;">
                        @endif
                    </div>

                    <!-- Botón de Editar -->
                    <div class="mt-3 col-12 text-end">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </form>

            <!-- Sección de Errores -->
            @if ($errors->any())
                <div class="mt-4 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </main>
    </div>

</body>

</html>
