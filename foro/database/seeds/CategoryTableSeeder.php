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
        for($i=0;$i<10;$i++) 
        {
            DB::table('categories')->insert
            ([            
                'titulo'=>str_random(20),
                'thread_id'=>$i+1,
            ]);
        }
    }
}
