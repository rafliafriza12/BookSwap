<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;

class ConversationController extends Controller
{
    public function index($receiver_id){
        $receiver = User::where('id',$receiver_id)->first();
        $conversation = Conversation::where('sender_id', auth()->user()->id)
        ->where('receiver_id',$receiver_id)->orWhere(function ($query) use ($receiver_id){
            $query->where('sender_id', $receiver_id)
                  ->where('receiver_id', auth()->user()->id);
        })->first();
        if($conversation==null){
            $chats = null;
            return view('pages.chat', compact('receiver','chats'));
        }else{
            $chats = Message::where('conversation_id', $conversation->id)->get();
            return view('pages.chat', compact('receiver','chats'));
        }
    }

    public function sendMessage(Request $request,$receiver_id){
        $conversation = Conversation::where('sender_id', auth()->user()->id)
        ->where('receiver_id',$receiver_id)->orWhere(function ($query) use ($receiver_id){
            $query->where('sender_id', $receiver_id)
                  ->where('receiver_id', auth()->user()->id);
        })->first();
        if($conversation == null){
            $newConversation = new Conversation();
            $newConversation->sender_id = auth()->user()->id;
            $newConversation->receiver_id = $receiver_id;
            $newConversation->save();

            Message::create([
                'conversation_id' => $newConversation->id,
                'sender_id' => auth()->user()->id,
                'message' => $request->message
            ]);
        }else{
            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => auth()->user()->id,
                'message' => $request->message
            ]);
        }

        return redirect('/chat/'.$receiver_id);
    }
}
