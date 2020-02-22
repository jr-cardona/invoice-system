@if($invoice->isExpired())
    <td class="content alert-danger">{{ __("Vencida") }}</td>
@elseif($invoice->isPaid())
    <td class="content alert-success">{{ __("Pagada") }}</td>
@elseif($invoice->isPending())
    <td class="content alert-warning">{{ __("Pendiente") }}</td>
@else
    <td class="content alert-info">{{ __("Sin definir") }}</td>
@endif
