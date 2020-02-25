<?php

namespace App\Http\Controllers;

use App\Invoice;
use Carbon\Carbon;
use Config;
use Illuminate\Http\Request;
use App\Http\Requests\SaveInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = Config::get('constants.paginate');
        $invoices = Invoice::with(["client", "seller", "products"])
            ->number($request->get('number'))
            ->client($request->get('client_id'))
            ->seller($request->get('seller_id'))
            ->product($request->get('product_id'))
            ->issuedDate($request->get('issued_init'), $request->get('issued_final'))
            ->expiresDate($request->get('expires_init'), $request->get('expires_final'))
            ->state($request->get('state'))
            ->orderBy('id', 'DESC');
        $count = $invoices->count();
        $invoices = $invoices->paginate($paginate);

        return response()->view('invoices.index', [
            'invoices' => $invoices,
            'request' => $request,
            'count' => $count,
            'paginate' => $paginate
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return response()->view('invoices.create', [
            'invoice' => new Invoice(),
            'request' => $request
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveInvoiceRequest $request)
    {
        $result = Invoice::create($request->validated());

        return redirect()->route('invoices.show', $result->id)->withSuccess(__('Factura creada satisfactoriamente'));
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return response()->view('invoices.show', [
            'invoice' => $invoice,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response | \Illuminate\Http\RedirectResponse
     */
    public function edit(Invoice $invoice)
    {
        if ($invoice->isPaid()) {
            return redirect()->route('invoices.show', $invoice)->withInfo(__("La factura ya se encuentra pagada y no se puede editar"));
        }
        if ($invoice->isAnnulled()) {
            return redirect()->route('invoices.show', $invoice)->withInfo(__("La factura ya se encuentra anulada y no se puede editar"));
        }
        return response()->view('invoices.edit', [
            'invoice' => $invoice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveInvoiceRequest $request
     * @param Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveInvoiceRequest $request, Invoice $invoice)
    {
        if ($invoice->isPaid()) {
            return redirect()->route('invoices.show', $invoice)->withInfo(__("La factura ya se encuentra pagada y no se puede editar"));
        }
        if ($invoice->isAnnulled()) {
            return redirect()->route('invoices.show', $invoice)->withInfo(__("La factura ya se encuentra anulada y no se puede editar"));
        }
        $invoice->update($request->validated());

        return redirect()->route('invoices.show', $invoice)->withSuccess(__('Factura actualizada satisfactoriamente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Invoice $invoice)
    {
        if (! $invoice->isAnnulled()) {
            $now = Carbon::now();
            $invoice->update(["annulled_at" => $now]);
            return redirect()->back()->withSuccess(__('Anulada correctamente'));
        } else {
            return redirect()->route('invoices.show', $invoice)->withError(__('Ya se encuentra anulada'));
        }
    }

    public function receivedCheck(Invoice $invoice)
    {
        if (! $invoice->isPaid() && ! $invoice->isAnnulled() && empty($invoice->received_at)) {
            $now = Carbon::now();
            $invoice->update(["received_at" => $now]);
            return redirect()->route('invoices.show', $invoice)->withSuccess(__('Marcada correctamente'));
        } else {
            return redirect()->route('invoices.show', $invoice)->withError(__('No se puede marcar'));
        }
    }
}
