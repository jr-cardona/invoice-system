<a href="{{ route('clients.edit', $client) }}" class="btn btn-primary">
    <i class="fa fa-edit"></i>@routeIs('clients.show', $client) {{ __("Editar") }} @endif
</a>
@if($client->invoices->count() == 0)
    <button type="button" class="btn btn-danger" data-route="{{ route('clients.destroy', $client) }}"
            data-toggle="modal" data-target="#confirmDeleteModal">
        <i class="fa fa-trash"></i>@routeIs('clients.show', $client) {{ __("Eliminar") }} @endif
    </button>
@endif
