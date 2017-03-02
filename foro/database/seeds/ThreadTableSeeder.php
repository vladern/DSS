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
        DB::table('threads')->truncate();
        DB::table('threads')->insert
        ([            
            'descripcion' => 'linux vs windows',
            'num_mensajes' => 1,
            'message_id' => 1,
         ]);
         DB::table('threads')->insert
         ([
            'descripcion' => 'IOS vs windows',
            'num_mensajes' => 1,
            'message_id' => 2,
         ]);
         DB::table('threads')->insert
         ([
            'descripcion' => 'Debian vs Ubuntu',
            'num_mensajes' => 1,
            'message_id' => 3,
         ]);
       
    }
}
