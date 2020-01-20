@extends('layouts.show')
@section('Title', 'Ver Cliente')
@section('Back')
    <div>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> {{ __("Volver") }}
        </a>
    </div>
    <div>
        <a class="btn btn-success" href="{{ route('clients.create') }}">
            <i class="fa fa-plus"></i> {{ __("Crear nuevo cliente") }}
        </a>
    </div>
@endsection
@section('Name')
    {{ $client->fullname }}
@endsection
@section('Buttons')
    @include('clients._buttons')
@endsection
@section('Body')
    <div class="shadow">
        <div class="card-header text-center"><h3>{{ __("Datos generales") }}</h3></div>
        <table class="table border-rounded table-sm">
            <tr>
                <td class="table-dark td-title">{{ __("Tipo de documento:") }}</td>
                <td class="td-content">{{ $client->type_document->fullname }}</td>

                <td class="table-dark td-title">{{ __("Número de documento:") }}</td>
                <td class="td-content">{{ $client->document }}</td>
            </tr>
            <tr>
                <td class="table-dark td-title">{{ __("Creado:")}}</td>
                <td class="td-content">{{ $client->created_at->isoFormat('Y-MM-DD hh:mma') }}</td>

                <td class="table-dark td-title">{{ __("Modificado:")}}</td>
                <td class="td-content">{{ $client->updated_at->isoFormat('Y-MM-DD hh:mma') }}</td>
            </tr>
            <tr>
                <td class="table-dark td-title">{{ __("Número telefónico:")}}</td>
                <td class="td-content">{{ $client->phone_number }}</td>

                <td class="table-dark td-title">{{ __("Celular:")}}</td>
                <td class="td-content">{{ $client->cell_phone_number }}</td>
            </tr>
            <tr>
                <td class="table-dark td-title">{{ __("Dirección:")}}</td>
                <td class="td-content">{{ $client->address }}</td>

                <td class="table-dark td-title">{{ __("Correo electrónico:")}}</td>
                <td class="td-content">{{ $client->email }}</td>
            </tr>
        </table>
    </div>
    <br>
    <div class="shadow">
        <div class="card-header text-center"><h3>{{ __("Facturas asociadas") }}</h3></div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>{{ __("Título") }}</th>
                    <th>{{ __("Fecha de expedición") }}</th>
                    <th>{{ __("Estado") }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($client->invoices as $invoice)
                <tr>
                    <td>
                        <a href="{{ route('invoices.show', $invoice) }}" target="_blank">
                            {{ __("Factura de venta No.")}} {{ $invoice->id }}
                        </a>
                    </td>
                    <td>{{ $invoice->issued_at }}</td>
                    @include('invoices.status_label')
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
