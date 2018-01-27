@extends('layouts.app')

@section('content')
    <h3 class="page-title">Pago</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Correo</th>
                            <td>{{ $payment->email }}</td>
                        </tr>
                        <tr>
                            <th>Mercante</th>
                            <td>{{ $payment->merchant }}</td>
                        </tr>
                        <tr>
                            <th>Cantidad</th>
                            <td>{{ $payment->amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.payments.index') }}" class="btn btn-default">Regresar</a>
        </div>
    </div>
@stop