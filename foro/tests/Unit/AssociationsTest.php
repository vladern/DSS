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
            $hilo->descripcion = 'Cual es el mejor para la mineria de Bitcoin ?';
            $hilo->num_mensajes = 1;
            $hilo->thread()->associate($categoria);
            $hilo->save();

            $mensaje = new Message();
            $mensaje->texto = 'Estas tonto como vas a minar nada en un Mac si tiene un I5 de m**** :(';
            $mensaje->fecha = '3/3/17';
            $mensaje->message()->associate($hilo);

            $this->assertEquals($categoria->hreads[0]->descipcion,'Cual es el mejor para la mineria de Bitcoin ?');
            $this->assertEquals($hilo->messages [0]->texto,'Estas tonto como vas a minar nada en un Mac si tiene un I5 de m**** :(');

            $mensaje->threads()->detach($thread->id);
            $mensaje->delete();
            $hilo->delete();
            $categoria->delete();
    }
}
