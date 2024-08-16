<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\MessageDeleted;
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
           
            event(new MessageSent($message->load("user")));

            return response()->json(['status' => 'Message sent successfully', 'message' => $message]);

        } 
    }

    public function deleteMessage(Request $request, $id)
    {
        $user = Auth::user();
        $message = Message::where('id', $id)->where('user_id', $user->id)->first();

        if ($message) {
            $message->update([
                'message' => '<this message has been deleted>',
                'is_deleted' => true
            ]);
            
            // Broadcast the deletion event
            event(new MessageDeleted($message->load("user")));

            return response()->json(['status' => 'Message deleted']);
        }

        return response()->json(['error' => 'Message not found'], 404);
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }
    
}
