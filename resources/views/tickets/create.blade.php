@extends('layouts.app')

@section('title', 'Nueva solicitud - HelpDesk')

@section('content')
    <div class="card">
        <h2>Nueva solicitud de soporte</h2>

        <p>
            Completa los datos para registrar una nueva solicitud.
        </p>

        @if ($errors->any())
            <div class="error" role="alert">
                <p>Por favor, corrige los siguientes errores:</p>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tickets.store', [], false) }}"
              method="POST">

            @csrf

            <label for="title">Título de la solicitud</label>
            <input
                type="text"
                id="title"
                name="title"
                maxlength="150"
                value="{{ old('title') }}"
                required
            >
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="description">Descripción del problema</label>
            <textarea
                id="description"
                name="description"
                rows="5"
                required
            >{{ old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="requester_name">Nombre del solicitante</label>
            <input
                type="text"
                id="requester_name"
                name="requester_name"
                maxlength="100"
                value="{{ old('requester_name') }}"
                required
            >
            @error('requester_name')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="requester_email">Correo electrónico</label>
            <input
                type="email"
                id="requester_email"
                name="requester_email"
                maxlength="150"
                value="{{ old('requester_email') }}"
                required
            >
            @error('requester_email')
                <p class="error">{{ $message }}</p>
            @enderror

            <label for="priority">Prioridad</label>
            <select id="priority" name="priority" required>
                <option value="low"
                    {{ old('priority', 'medium') === 'low' ? 'selected' : '' }}>
                    Baja
                </option>

                <option value="medium"
                    {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}>
                    Media
                </option>

                <option value="high"
                    {{ old('priority', 'medium') === 'high' ? 'selected' : '' }}>
                    Alta
                </option>

                <option value="critical"
                    {{ old('priority', 'medium') === 'critical' ? 'selected' : '' }}>
                    Crítica
                </option>
            </select>
            @error('priority')
                <p class="error">{{ $message }}</p>
            @enderror

            <br><br>

            <button type="submit" class="button">
                Registrar solicitud
            </button>

            <a href="{{ route('tickets.index', [], false) }}"
               class="button">
                Cancelar
            </a>
        </form>
    </div>
@endsection