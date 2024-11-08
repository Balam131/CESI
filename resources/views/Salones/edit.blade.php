<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Editar Salón</title>

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
        <h3 class="mb-4">
            Editar Salón <i>{{ $salon->salon_grado }} {{ $salon->salon_grupo }} </i>
        </h3>

        <main>
            <form action="{{ route('salones.update', $salon->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <!-- Grado -->
                    <div class="col-md-6">
                        <label for="salon_grado" class="form-label">Grado</label>
                        <input type="text" class="form-control" id="salon_grado" name="salon_grado"
                            value="{{ old('salon_grado', $salon->salon_grado) }}">
                    </div>

                    <!-- Grupo -->
                    <div class="col-md-6">
                        <label for="salon_grupo" class="form-label">Grupo</label>
                        <input type="text" class="form-control" id="salon_grupo" name="salon_grupo"
                            value="{{ old('salon_grupo', $salon->salon_grupo) }}">
                    </div>

                    <!-- Escuela -->
                    <div class="col-md-6">
                        <label for="cesi_escuela_id" class="form-label">Escuela</label>
                        <select name="cesi_escuela_id" id="cesi_escuela_id" class="form-select" required>
                            <option selected disabled>Seleccione una escuela</option>
                            @foreach ($escuelas as $escuela)
                                <option value="{{ $escuela->id }}"
                                    {{ old('cesi_escuela_id', $salon->cesi_escuela_id) == $escuela->id ? 'selected' : '' }}>
                                    {{ $escuela->escuela_nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Maestro -->
                    <div class="col-md-6">
                        <label for="cesi_maestro_id" class="form-label">Maestro</label>
                        <select class="form-select" id="cesi_maestro_id" name="cesi_maestro_id">
                            <option selected disabled>Seleccione un maestro</option>
                            @foreach ($maestros as $maestro)
                                <option value="{{ $maestro->id }}"
                                    {{ old('cesi_maestro_id', $salon->cesi_maestro_id) == $maestro->id ? 'selected' : '' }}>
                                    {{ $maestro->maestro_nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botón de envío -->
                    <div class="mt-3 col-12 text-end">
                        <button type="submit" class="btn btn-primary">Actualizar Salón</button>
                    </div>
                </div>
            </form>

            <!-- Errores -->
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
