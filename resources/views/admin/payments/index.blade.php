@extends('layouts.app')

@section('content')
    <h3 class="page-title">Pagos</h3>
    @can('payment_create')
    <p>
        <a href="{{ route('admin.payments.create') }}" class="btn btn-success">Realizar pago</a>
        
    </p>
    @endcan

    <div class="panel panel-default">

        <div class="panel-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Correo</th>
                        <th>Wallets</th>
                        <th>Cantidad de boletos</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($payments) > 0)
                        @foreach ($payments as $payment)
                            <tr data-entry-id="{{ $payment->id }}">
                                
                                <td>{{ $payment->email }}</td>
                                <td>{{ $payment->merchant }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>
                                    @can('payment_view')
                                    <a href="{{ route('admin.payments.show',[$payment->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">vacio</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection