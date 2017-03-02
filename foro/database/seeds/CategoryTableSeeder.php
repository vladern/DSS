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
        ]);
        DB::table('categories')->insert
        ([
            'titulo'=>'Minería Linux',
        ]);
        DB::table('categories')->insert
        ([
            'titulo'=>'Minería IOS',
        ]);
    }
}
