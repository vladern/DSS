<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
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
            DB::table('messages')->insert
            ([            
                'texto' => str_random(20),
                'fecha' => '1/3/17',
            ]);
        }
    }
}
