@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Productos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('products.create') }}">Crear nuevo producto</a>
        </div>
    </div>
    <br>
    <table class="table border-rounded table-striped">
        <thead class="thead-dark">
            <tr style="text-align: center;">
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col" nowrap>Fecha de creación</th>
                <th scope="col" nowrap>Fecha de modificación</th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr style="text-align: center;">
                    <td>
                        <a href="{{ route('products.show', $product) }}" target="_blank">
                            {{ $product->type_document }} {{ $product->sic_code }}
                        </a>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->address }}</td>
                    <td>{{ $product->email }}</td>
                    <td>{{ $product->cell_phone_number }}</td>
                    <td style="text-align: center">
                        @include('products._buttons')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection