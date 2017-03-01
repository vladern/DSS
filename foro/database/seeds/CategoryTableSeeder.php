<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        DB::table('categories')->insert
        ([            
            'titulo'=>'Minería Windows',
            'thread_id'=> 1,
            'titulo'=>'Minería Linux',
            'thread_id'=> 2,
            'titulo'=>'Minería IOS',
            'thread_id'=>3,
        ]);
    }
}
