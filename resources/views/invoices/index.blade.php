@extends('layouts.app')
@section('title', 'Facturas')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Facturas</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('invoices.create') }}">Crear nueva factura</a>
        </div>
    </div>
    <br>
    <table class="table border-rounded table-striped">
        <thead class="thead-dark">
            <tr style="text-align: center">
                <th scope="col">Título</th>
                <th scope="col" nowrap>Fecha de expedición</th>
                <th scope="col" nowrap>Fecha de vencimiento</th>
                <th scope="col">Valor total</th>
                <th scope="col">Estado</th>
                <th scope="col">Cliente</th>
                <th scope="col" style="text-align: center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr style="text-align: center">
                    <td>
                        <a href="{{ route('invoices.show', $invoice) }}" target="_blank">
                            Factura de venta No. {{ $invoice->number }}
                        </a>
                    </td>
                    <td>{{ $invoice->expedition_date }}</td>
                    <td>{{ $invoice->due_date }}</td>
                    <td>${{ $invoice->total }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client) }}" target="_blank">
                            {{ $invoice->client->name }}
                        </a>
                    </td>
                    <td>
                        @include('invoices._buttons')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
