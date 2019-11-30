<?php
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('/facturas/{invoice}/detalle', 'InvoiceProductController')
    ->except('index', 'show')
    ->names('invoiceDetails')
    ->parameters(['detalle' => 'product']);

Route::resource('/facturas', 'InvoiceController')
    ->names('invoices')
    ->parameters(['facturas' => 'invoice']);

Route::resource('/clientes', 'ClientController')
    ->names('clients')
    ->parameters(['clientes' => 'client']);

Route::resource('/productos', 'ProductController')
    ->names('products')
    ->parameters(['productos' => 'product']);

Route::resource('vendedores', 'SellerController')
    ->names('sellers')
    ->parameters(['vendedores' => 'seller']);

Route::post('/autocomplete/client', 'AutocompleteController@client')->name('autocomplete.client');
Route::post('/autocomplete/seller', 'AutocompleteController@seller')->name('autocomplete.seller');
Route::post('/autocomplete/product', 'AutocompleteController@product')->name('autocomplete.product');
