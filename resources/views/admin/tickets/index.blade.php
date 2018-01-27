@extends('layouts.app')

@section('content')
    <h3 class="page-title">Tickets</h3>
    @can('ticket_create')
    <p>
        <a href="{{ route('admin.tickets.create') }}" class="btn btn-success">Agregar nuevo ticket</a>
        
    </p>
    @endcan

    <div class="panel panel-default">

        <div class="panel-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        @can('ticket_delete')
                            <th style="text-align:center;"></th>
                        @endcan

                        <th>Evento</th>
                        <th>Titulo</th>
                        <th>Cantidad</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha fin</th>
                        <th>Precio</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tickets) > 0)
                        @foreach ($tickets as $ticket)
                            <tr data-entry-id="{{ $ticket->id }}">
                                @can('ticket_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $ticket->event->title or '' }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->amount }}</td>
                                <td>{{ $ticket->available_from }}</td>
                                <td>{{ $ticket->available_to }}</td>
                                <td>{{ $ticket->price }}</td>
                                <td>
                                    @can('ticket_view')
                                    <a href="{{ route('admin.tickets.show',[$ticket->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('ticket_edit')
                                    <a href="{{ route('admin.tickets.edit',[$ticket->id]) }}" class="btn btn-xs btn-info">Editar</a>
                                    @endcan
                                    @can('ticket_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Desea eliminar")."');",
                                        'route' => ['admin.tickets.destroy', $ticket->id])) !!}
                                    {!! Form::submit(trans('Eliminar'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">Vacio</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('ticket_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.tickets.mass_destroy') }}';
        @endcan

    </script>
@endsection