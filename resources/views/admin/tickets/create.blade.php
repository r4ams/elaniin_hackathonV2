@extends('layouts.app')

@section('content')
    <h3 class="page-title">Tickets</h3>

    <form method="POST" action="{{ route('admin.tickets.store') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            Crear
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="event_id" class="control-label">Event</label>
                    <select class="form-control" name="event_id">
                     @foreach($events as $event)
                       <option value="{{ $event->id }}"> {{ $event->title }} </option>
                     @endforeach
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('event_id'))
                        <p class="help-block">
                            {{ $errors->first('event_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="title" class="control-label">Ticket Type</label>
                <input class="form-control" required="" name="title" type="text" id="title">
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="amount" class="control-label">Cantidad tickets</label>
                <input class="form-control" placeholder="" required="" name="amount" type="text" id="amount">
                    <p class="help-block"></p>
                    @if($errors->has('amount'))
                        <p class="help-block">
                            {{ $errors->first('amount') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="available_from" class="control-label">Fecha Inicio</label>
                <input class="form-control" placeholder="" required="" name="available_from" type="text" id="available_from">
                    <p class="help-block"></p>
                    @if($errors->has('available_from'))
                        <p class="help-block">
                            {{ $errors->first('available_from') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="available_to" class="control-label">Fecha Fin</label>
                <input class="form-control" placeholder="" required="" name="available_to" type="text" id="available_to">
                    <p class="help-block"></p>
                    @if($errors->has('available_to'))
                        <p class="help-block">
                            {{ $errors->first('available_to') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="price" class="control-label">Precio</label>
                <input class="form-control" placeholder="" required="" name="price" type="text" id="price">
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
<input class="btn btn-danger" type="submit" value="Guardar">
</form>
@stop
