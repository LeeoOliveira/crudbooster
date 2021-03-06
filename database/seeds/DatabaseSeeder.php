<?php

use App\Funcionarios;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FuncionariosTableSeeder::class);
        $this->call(CidadeTableSeeder::class);

    }
}
