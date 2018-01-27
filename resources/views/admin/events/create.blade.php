@extends('layouts.app')

@section('content')
    <h3 class="page-title"><ELEMENT>Eventos</ELEMENT></h3>
    <form method="POST" action="{{ route('admin.events.store') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            Crear
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="title" class="control-label">Titulo: </label>
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
                <label for="description" class="control-label">Descripción: </label>
                <textarea class="form-control editor" placeholder="" name="description" cols="50" rows="10" id="description"></textarea>
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="start_time" class="control-label">Fecha y hora de Inicio: </label>
                <input class="form-control datetime" placeholder="" required="" name="start_time" type="text" id="start_time">
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="venue" class="control-label">Locación: </label>
                <textarea class="form-control " placeholder="" required="" name="venue" cols="50" rows="10" id="venue"></textarea>
                    <p class="help-block"></p>
                    @if($errors->has('venue'))
                        <p class="help-block">
                            {{ $errors->first('venue') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    <input class="btn btn-danger" type="submit" value="Guardar">
    </form>
@endsection