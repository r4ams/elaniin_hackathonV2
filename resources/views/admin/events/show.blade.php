@extends('layouts.app')

@section('content')
    <h3 class="page-title">Evento</h3>

    <div class="panel panel-default">

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Titulo</th>
                            <td>{{ $event->title }}</td>
                        </tr>
                        <tr>
                            <th>Descripcion</th>
                            <td>{!! $event->description !!}</td>
                        </tr>
                        <tr>
                            <th>Fecha y hora de inicio</th>
                            <td>{{ $event->start_time }}</td>
                        </tr>
                        <tr>
                            <th>Locacion</th>
                            <td>{!! $event->venue !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#tickets" aria-controls="tickets" role="tab" data-toggle="tab">Tickets</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="tickets">
<table class="table table-bordered table-striped {{ count($tickets) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
                    <td>{{ $ticket->event->title or '' }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->amount }}</td>
                                <td>{{ $ticket->available_from }}</td>
                                <td>{{ $ticket->available_to }}</td>
                                <td>{{ $ticket->price }}</td>
                                <td>
                                    @can('ticket_view')
                                    <a href="{{ route('admin.tickets.show',[$ticket->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('ticket_edit')
                                    <a href="{{ route('admin.tickets.edit',[$ticket->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('ticket_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tickets.destroy', $ticket->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.events.index') }}" class="btn btn-default">Regresar</a>
        </div>
    </div>
@stop