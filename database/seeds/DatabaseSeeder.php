<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(PerfisTableSeeder::class);
        $this->call(AutoresTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(IdiomasTableSeeder::class);
        $this->call(LivrosTableSeeder::class);
        $this->call(EmprestimosTableSeeder::class);
        $this->call(AutoresLivrosTableSeeder::class);
        $this->call(GenerosLivrosTableSeeder::class);
    }
}
