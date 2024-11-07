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
        <form action="{{ route('salones.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="salon_grado">Grado</label>
                <input type="text" class="form-control" id="salon_grado" name="salon_grado"
                    value="{{ old('salon_grado') }}">
            </div>

            <div class="form-group">
                <label for="salon_grupo">Grupo</label>
                <input type="text" class="form-control" id="salon_grupo" name="salon_grupo"
                    value="{{ old('salon_grupo') }}">
            </div>

            <div class="form-group">
                <label for="cesi_escuela_id">Escuela</label>
                <select name="cesi_escuela_id" id="cesi_escuela_id" class="form-control" required>
                    @foreach ($escuelas as $escuela)
                        <option value="{{ $escuela->id }}"
                            {{ old('cesi_escuela_id') == $escuela->id ? 'selected' : '' }}>
                            {{ $escuela->escuela_nombre }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="cesi_maestro_id">Maestro</label>
                <select class="form-control" id="cesi_maestro_id" name="cesi_maestro_id">
                    @foreach ($maestros as $maestro)
                        <option value="{{ $maestro->id }}"
                            {{ old('cesi_maestro_id') == $maestro->id ? 'selected' : '' }}>
                            {{ $maestro->maestro_nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Crear Salón</button>
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
