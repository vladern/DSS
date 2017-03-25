<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    public function thread() {
        return $this->belongsTo('App\Thread');
    }

    public static function getMessages(){
        $allMessages = Message::All();
        return $allMessages;
    } 

    public static function createMessage($texto) {
    	$message = new Message;
    	$message->texto = $texto;
    	$message->save();
    }

    public static function modifyMessage($message_old, $message_new) {

    }

    public static function deleteMessage($titulo) {
        
    }

}
