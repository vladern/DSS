<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Category;
use App\Thread;
use App\Message;

class DataTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCategoryData(){

        $count = Category::all()->count();
        $this->assertEquals($count, 4);
        $this->assertDatabaseHas('categories', ['titulo' => 'Minería Windows']);
        $this->assertDatabaseHas('categories', ['titulo' => 'Minería Linux']);
        $this->assertDatabaseHas('categories', ['titulo' => 'Minería IOS']);
       

    }
}
