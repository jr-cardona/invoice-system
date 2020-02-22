@extends('layouts.app')
@section('title', 'Crear Vendedor')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ __("Crear Vendedor") }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('sellers.store') }}" class="form-group" method="POST">
                @include('sellers._form')
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> {{ __("Guardar") }}
                    </button>
                    <a href="{{ route("sellers.index") }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> {{ __("Volver") }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
