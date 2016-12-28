<?php

use Illuminate\Database\Seeder;
use App\Kategori;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Kategori::create(['nama' => 'klinik bugis']);
         Kategori::create(['nama' => 'klinik panjang']);
          Kategori::create(['nama' => 'klinik amanah']);
    }
}
