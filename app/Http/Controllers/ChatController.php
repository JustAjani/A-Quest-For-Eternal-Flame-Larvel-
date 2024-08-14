<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validate and store the message
        $message = Message::create([
            'message' => $request->message,
        ]);

        // Broadcast the message event
        event(new MessageSent($message->message));

        return response()->json(['status' => 'Message sent!']);
    }

    public function fetchMessages()
    {
        return Message::all();
    }
}
