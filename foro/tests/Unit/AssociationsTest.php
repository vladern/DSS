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
        $this->assertEquals($categoria->threads[0]->descripcion, 'Futbol');
        $this->assertEquals($categoria->threads[0]->num_mensajes, 0);

        $categoria->delete();
        $hilo->delete();
    }

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
            
            $mensaje = new Message();
            $mensaje->texto = 'Probando';
            $mensaje->fecha = '3/3/17';
            
            $hilo->category()->associate($categoria);
            $hilo->save();
            $mensaje->thread()->associate($hilo);
            $mensaje->save();
            

            $this->assertEquals($mensaje->thread->descripcion,'Cual es el');
            $this->assertEquals($mensaje->thread->category->titulo,'Mac vs Linux');
            $this->assertEquals($categoria->threads[0]->messages[0]->texto,'Probando');
            $this->assertEquals($categoria->threads[0]->messages[0]->fecha,'3/3/17');
            $this->assertEquals($hilo->messages[0]->texto,'Probando');

            $mensaje->delete();
            $hilo->delete();
            $categoria->delete();
    }
}
