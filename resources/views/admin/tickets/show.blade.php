@extends('layouts.app')

@section('content')
    <h3 class="page-title">Ticket</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Evento</th>
                                <td>{{ $ticket->event->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>Tipo de ticket</th>
                            <td>{{ $ticket->title }}</td>
                        </tr>
                        <tr>
                            <th>Cantidad disponible</th>
                            <td>{{ $ticket->amount }}</td>
                        </tr>
                        <tr>
                            <th>Fecha inicio</th>
                            <td>{{ $ticket->available_from }}</td>
                        </tr>
                        <tr>
                            <th>Fecha fin</th>
                            <td>{{ $ticket->available_to }}</td>
                        </tr>
                        <tr>
                            <th>Precio</th>
                            <td>{{ $ticket->price }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tickets.index') }}" class="btn btn-default">Regresar</a>
        </div>
    </div>
@stop