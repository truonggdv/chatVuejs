<?php

namespace App\Http\Controllers;
use App\Message;
use App\Events\MessageSent;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function postMessage(Request $request){
        $messages = Message::create([
            'content' => $request->message,
            'author' => auth()->user()->name
        ]);
        broadcast(new MessageSent(auth()->user(), $request->message));
        return $request->message;
    }

    
}
