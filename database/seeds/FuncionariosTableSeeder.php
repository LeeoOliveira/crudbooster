<?php

use App\Funcionarios;
use Illuminate\Database\Seeder;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Funcionarios::class, 10)->create();
    }
}
