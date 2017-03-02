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
<<<<<<< HEAD
                'thread_id' => 1
=======
                'thread_id'=>1,
>>>>>>> master
            ]);
            DB::table('messages')->insert
            (
                [
                    'texto' => 'Es mejor Windows!!',
                    'fecha' => '1/3/17',
                    'thread_id'=>2,
                ]
            );               
            DB::table('messages')->insert
            ([
                'texto' => 'Es mejor Debian!!',
                'fecha' => '1/3/17',
                'thread_id'=>3,
            ]);    

        
    }
}
