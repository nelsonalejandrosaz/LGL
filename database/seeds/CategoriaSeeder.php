<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['codigo' => 'ACT', 'nombre' => 'Aceite', 'descripcion' => 'Base de aceite']);
        Categoria::create(['codigo' => 'HAR', 'nombre' => 'Harina', 'descripcion' => 'Base de harina']);
        Categoria::create(['codigo' => 'COL', 'nombre' => 'Colorante', 'descripcion' => 'Colorantes artificiales']);
        Categoria::create(['codigo' => 'ESE', 'nombre' => 'Esencia', 'descripcion' => 'Esencias de olor']);
    }
}
