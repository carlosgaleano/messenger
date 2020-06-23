<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=> 'carlos',
            'email'=>'usuario@dominio.com',
            'password'=> bcrypt('123456')
        ]);

        User::create([
            'name'=> 'Juan',
            'email'=>'Juan@dominio.com',
            'password'=> bcrypt('123456')
        ]);

      

    }
}
