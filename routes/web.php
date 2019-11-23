<?php
Route::get('/', 'HomeController@index');

Route::resource('/facturas/{invoice}/producto', 'InvoiceProductController')
    ->except('index', 'show')
    ->names('invoiceDetails')
    ->parameters(['producto' => 'product']);

Route::resource('/facturas', 'InvoiceController')
    ->names('invoices')
    ->parameters(['facturas' => 'invoice']);

Route::resource('/clientes', 'ClientController')
    ->names('clients')
    ->parameters(['clientes' => 'client']);

Route::resource('/productos', 'ProductController')
    ->names('products')
    ->parameters(['productos' => 'product']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
