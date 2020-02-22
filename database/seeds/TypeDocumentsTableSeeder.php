<?php

use Illuminate\Database\Seeder;
use App\TypeDocument;

class TypeDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeDocument::create([
            'name' => 'CC',
            'fullname' => 'Cédula de ciudadanía'
        ]);
        TypeDocument::create([
            'name' => 'NIT',
            'fullname' => 'NIT'
        ]);
        TypeDocument::create([
            'name' => 'TI',
            'fullname' => 'Tarjeta de identidad'
        ]);
        TypeDocument::create([
            'name' => 'PPN',
            'fullname' => 'Pasaporte'
        ]);
        TypeDocument::create([
            'name' => 'CE',
            'fullname' => 'Cédula de extranjería'
        ]);
    }
}
