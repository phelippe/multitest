<?php

use Illuminate\Database\Seeder;
use Multitest\Entities\Cliente;
use Multitest\Entities\Motorista;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        #Criação de Cliente
        factory(Cliente::class)->create(
            [
                'name' => 'Cliente',
                'email' => 'cliente@email.com',
                'password' => bcrypt(1234),
                'remember_token' => str_random(10),
            ]
        );

        #Criação de Motorista
        factory(Motorista::class)->create(
            [
                'name' => 'Motorista',
                'email' => 'motorista@email.com',
                'password' => bcrypt(1234),
                'remember_token' => str_random(10),
            ]
        );
    }
}
