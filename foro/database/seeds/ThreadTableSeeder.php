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
        for($i=0;$i<10;$i++) 
        {
            DB::table('threads')->insert
            ([            
                'descripcion' => str_random(20),
                'num_mensajes' => rand(0,50),
                'message_id' => $i+1,
            ]);
        }
    }
}
