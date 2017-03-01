<?php

use Illuminate\Database\Seeder;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert
        ([            
            'descripcion' => 'linux vs windows',
            'num_mensajes' => 1,
            'message_id' => 1,
            //
            'descripcion' => 'IOS vs windows',
            'num_mensajes' => 1,
            'message_id' => 2,
            //
            'descripcion' => 'Debian vs Ubuntu',
            'num_mensajes' => 1,
            'message_id' => 3,
        ]);
    }
}
