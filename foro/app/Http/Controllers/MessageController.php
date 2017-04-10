<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\User;
use App\Message;
use App\Image;
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
        $images = Image::orderBy('id','asc')->paginate(5);
        //dd($threads);
        return view('admin.admin', compact('images'))->with('threads',$threads)->with('users',$users)->with('categories',$categories)->with('messages', $messages)->with('images', $images);
    }

    public function destroy($id)
   	{
        $message = Message::find($id);
        $message->delete();
        flash('El mensaje ha sido borrado', 'danger');
        return redirect()->route('message.index');
    }
}
