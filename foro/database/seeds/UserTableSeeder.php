<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            DB::table('users')->insert
            ([            
                'name' => 'Jorge',
                'apellidos' => 'Gomariz Sogorb',
                'nick' => 'JorgeElMelenas',
                'tipo' => 'admin',
                'email' => 'jorge@gmail.com',
                'password' => bcrypt('secret'),
            ]);

            DB::table('users')->insert
            ([            
                'name' => 'Hector',
                'apellidos' => 'Guillo Anton',
                'nick' => 'CurtidorDeLomos',
                'tipo' => 'admin',
                'email' => 'hector@gmail.com',
                'password' => bcrypt('secret'),
            ]);

            DB::table('users')->insert
            ([            
                'name' => 'Vlad',
                'apellidos' => 'Kuchmenko',
                'nick' => 'Vladernn',
                'tipo' => 'normal',
                'email' => 'vlad@gmail.com',
                'password' => bcrypt('secret'),
            ]);        
    }
}
