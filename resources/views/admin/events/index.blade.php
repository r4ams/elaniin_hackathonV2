@extends('layouts.app')

@section('content')
    <h3 class="page-title">Eventos</h3>
    @can('event_create')
    <p>
        <a href="{{ route('admin.events.create') }}" class="btn btn-success">Agregar nuevo evento</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        @can('event_delete')
                            <th style="text-align:center;">
                           </th>
                        @endcan

                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha y hora de inicio</th>
                        <th>Locacion</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($events) > 0)
                        @foreach ($events as $event)
                            <tr data-entry-id="{{ $event->id }}">
                                @can('event_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $event->title }}</td>
                                <td>{!! $event->description !!}</td>
                                <td>{{ $event->start_time }}</td>
                                <td>{!! $event->venue !!}</td>
                                <td>
                                    @can('event_view')
                                    <a href="{{ route('admin.events.show',[$event->id]) }}" class="btn btn-xs btn-primary">Ver</a>
                                    @endcan
                                    @can('event_edit')
                                    <a href="{{ route('admin.events.edit',[$event->id]) }}" class="btn btn-xs btn-info">Editar</a>
                                    @endcan
                                    @can('event_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Desea eliminarlo")."');",
                                        'route' => ['admin.events.destroy', $event->id])) !!}
                                    {!! Form::submit(trans('Eliminar'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">vacio</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('event_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.events.mass_destroy') }}';
        @endcan

    </script>
@endsection