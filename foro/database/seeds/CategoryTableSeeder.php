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
        DB::table('categories')->delete();
        DB::table('categories')->insert
        ([            
            'titulo'=>'Minería Windows',
            'user_id' => 1
        ]);
        DB::table('categories')->insert
        ([
            'titulo'=>'Minería Linux',
            'user_id' => 2
        ]);
        DB::table('categories')->insert
        ([
            'titulo'=>'Minería IOS',
            'user_id' => 1
        ]);
    }
}
