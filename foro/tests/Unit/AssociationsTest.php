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
     * tests assosiation thread category
     *
     * @return void
     */
/*
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
        $this->assertEquals($categoria->threads, 'Futbol');
        
        $categoria->delete();
        $hilo->delete();
    }*/

    /**
    * test assosiation messages threads
    *
    *@return void 
    */
    public function testCategoriesThreadsMessages()
    {
            $categoria = new Category();
            $categoria->titulo = 'Mac vs Linux';
            $categoria->save();

            $hilo = new Thread();
            $hilo->descripcion = 'Cual es el';
            $hilo->num_mensajes = 1;
            $hilo->save();

            //$hilo->category()->associate($categoria);
            //$hilo->save();

            $mensaje = new Message();
            $mensaje->texto = 'Estas tonto';
            $mensaje->fecha = '3/3/17';
            $mensaje->save();

            $hilo->messages()->save($mensaje);
            $categoria->threads()->save($hilo);

            //$mensaje->thread()->associate($hilo);
            //$mensaje->save();

            $this->assertEquals($categoria->threads[0]->descipcion,'Cual es el');
            $this->assertEquals($hilo->messages[0]->texto,'Estas tonto');

            //$mensaje->threads()->detach($thread->id);
            $mensaje->delete();
            $hilo->delete();
            $categoria->delete();
    }
}
