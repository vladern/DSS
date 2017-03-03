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
        $this->assertEquals($count, 3);
        $this->assertDatabaseHas('categories', ['titulo' => 'Minería Windows']);
        $this->assertDatabaseHas('categories', ['titulo' => 'Minería Linux']);
        $this->assertDatabaseHas('categories', ['titulo' => 'Minería IOS']);
    }

    public function testThreadData(){

        $count = Thread::all()->count();
        $this->assertEquals($count, 3);
        $this->assertDatabaseHas('threads', ['descripcion' => 'linux vs windows']);
        $this->assertDatabaseHas('threads', ['descripcion' => 'IOS vs windows']);
        $this->assertDatabaseHas('threads', ['descripcion' => 'Debian vs Ubuntu']);
    }

    public function testMessageData(){

        $count = Thread::all()->count();
        $this->assertEquals($count, 3);
        $this->assertDatabaseHas('messages', ['texto' => 'Es mejor linux!!']);
        $this->assertDatabaseHas('messages', ['texto' => 'Es mejor Windows!!']);
        $this->assertDatabaseHas('messages', ['texto' => 'Es mejor Debian!!']);
    }

    public function testAddData(){

            $categoria = new Category();
            $categoria->titulo = 'DSS';
            $categoria->save();

            $hilo = new Thread();
            $hilo->descripcion = 'Mola';
            $hilo->num_mensajes = 1;
            
            $mensaje = new Message();
            $mensaje->texto = 'Mucho';
            $mensaje->fecha = '3/3/17';
            
            $hilo->category()->associate($categoria);
            $hilo->save();
            $mensaje->thread()->associate($hilo);
            $mensaje->save();
            
            $this->assertDatabaseHas('categories', ['titulo' => 'DSS']);
            $this->assertDatabaseHas('threads', ['descripcion' => 'Mola']);
            $this->assertDatabaseHas('messages', ['texto' => 'Mucho']);

            $mensaje->delete();
            $hilo->delete();
            $categoria->delete();
    }
}
