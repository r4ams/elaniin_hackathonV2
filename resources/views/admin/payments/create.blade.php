@extends('layouts.app')

@section('content')
    <h3 class="page-title">Pago</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.payments.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="event_id" class="control-label">Event</label>
                    <select class="form-control" name="event_id">
                     @foreach($events as $event)
                       <option value="{{ $event->id }}"> {{ $event->title }} </option>
                     @endforeach
                    </select>
                </div>
            </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="event_id" class="control-label">Ticket</label>
                    <select class="form-control" name="event_id">
                     @foreach($tickets as $ticket)
                       <option value="{{ $ticket->id }}"> {{ $ticket->title }} </option>
                     @endforeach
                    </select>
                </div>
            </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Correo', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('merchant', 'Wallets', ['class' => 'control-label']) !!}
                    {!! Form::text('merchant', old('merchant'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('merchant'))
                        <p class="help-block">
                            {{ $errors->first('merchant') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('amount', 'Cantidad', ['class' => 'control-label']) !!}
                    {!! Form::text('amount', old('amount'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('amount'))
                        <p class="help-block">
                            {{ $errors->first('amount') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('Pagar'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

