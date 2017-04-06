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
        
            DB::table('messages')->truncate();
            DB::table('messages')->insert
            ([            
                'texto' => 'Es mejor linux!!',
                'fecha' => '1/3/17',
                'thread_id'=>1,
                'user_id' => 1
            ]);
            DB::table('messages')->insert
            ([            
                'texto' => 'Que gran verdad ha dicho',
                'fecha' => '1/3/17',
                'thread_id'=>1,
                'user_id' => 2
            ]);
            DB::table('messages')->insert
            ([
                'texto' => 'Es mejor Windows!!',
                'fecha' => '1/3/17',
                'thread_id'=>2,
                'user_id' => 2
                
            ]);               
            DB::table('messages')->insert
            ([
                'texto' => 'Es mejor Debian!!',
                'fecha' => '1/3/17',
                'thread_id'=>3,
                'user_id' => 3
            ]);
            DB::table('messages')->insert
            ([
                'texto' => 'Eso no es asi',
                'fecha' => '4/3/17',
                'thread_id'=>3,
                'user_id' => 2
            ]);   
            DB::table('messages')->insert
            ([
                'texto' => 'Yo creo que si',
                'fecha' => '5/3/17',
                'thread_id'=>3,
                'user_id' => 1
            ]);     

        
    }
}
