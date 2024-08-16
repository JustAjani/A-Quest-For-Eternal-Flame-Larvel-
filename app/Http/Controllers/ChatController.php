<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{   
    public function sendMessage(Request $request)
    {
        {
            $user = Auth::user();  // Ensure the user is authenticated

            $message = new Message([
                'message' => $request->message,
                'user_id' => $user->id  // Ensure user_id is correctly assigned
            ]);

            $message->save();  // Attempt to save the message

            broadcast(new MessageSent($message))->toOthers();

            return response()->json(['status' => 'Message sent successfully', 'message' => $message]);

        } 
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

}
