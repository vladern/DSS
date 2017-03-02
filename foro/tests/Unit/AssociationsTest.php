<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Category;
use App\Thread;
use App\Message;

class AssociationsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCategoryThread(){

        $categoria = new Category();
        $categoria->titulo = 'General';
        $categoria->save();

        $hilo = new Thread();
        $hilo->descripcion = 'Futbol';
        $hilo->num_mensajes = 0;
        $hilo->category()->associate($categoria);
        $hilo->save();
        
        $this->assertEquals($hilo->category->titulo, 'General');
        $this->assertEquals($categoria->threads->descripcion, 'Futbol');
        
        $categoria->delete();
        $hilo->delete();

    }
}
