<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Redirect;
use Laracast\Flash\Flash;
use App\Http\Requests\ThreadRequest;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(4);
        $categories = Category::orderBy('id','asc')->paginate(4);
        $threads = Thread::orderBy('id','asc')->paginate(5);
        $threads->each(function($threads)
        {
            $threads->category;
            $threads->user;
            $threads->messages;
        });
        $messages = Message::orderBy('id', 'asc')->paginate(4);
        //dd($threads);
        return view('admin.admin')->with('threads',$threads)->with('users',$users)->with('categories',$categories)->with('messages', $messages);
    }

    public function destroy($id)
   	{
        $message = Message::find($id);
        $message->delete();
        flash('El mensaje ha sido borrado', 'danger');
        return redirect()->route('message.index');
    }
}
