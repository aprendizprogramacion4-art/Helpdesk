@extends('layouts.app')

@section('title', 'Support Tickets - HelpDesk')

@section('content')
    <div class="card">
        <h2>Solicitudes de soporte</h2>

        <p>
            Administra y consulta las solicitudes registradas en HelpDesk.
        </p>

        <a href="{{ route('tickets.create', [], false) }}" class="button">
            + Nueva solicitud
        </a>

        @if ($tickets->isEmpty())
            <p>No hay solicitudes registradas todavía.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Solicitante</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->requester_name }}</td>
                            <td>{{ ucfirst($ticket->priority) }}</td>
                            <td>{{ ucfirst($ticket->status) }}</td>
                            <td>
                                {{ $ticket->created_at->format('d/m/Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection