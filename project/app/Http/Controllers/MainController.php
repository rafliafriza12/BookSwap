<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Conversation;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index(){
        $books = Book::all();
        $conversations =  Conversation::where('sender_id', auth()->user()->id)
            ->orWhere(function ($query) {
                $query->where('receiver_id', auth()->user()->id);
            })
            ->get();
            $conversations1 = collect($conversations)->map(function ($conversation){
                $sender = User::where('id',$conversation->sender_id)->first();
                $receiver = User::where('id',$conversation->receiver_id)->first();
                return (object) [
                    'id' => $conversation->id,
                    'sender_id' => $conversation->sender_id,
                    'receiver_id' => $conversation->receiver_id,
                    'sender' => $sender,
                    'receiver' => $receiver,
                ];
            })->all();
            Session::put('conversations',$conversations1);
        return view('pages.home', compact('books'));
    }

    public function category($kategori){
        if($kategori === "all"){
            return redirect('/');
        }else{
            $books = Book::where('kategori','=',$kategori)->get();
            return view('pages.home', compact('books'));
        }
    }

    public function search($keyword){
        $books = Book::where('judul', 'like', $keyword . '%')
                 ->get();
        
        return view('components.books', compact('books'));
    }

    public function getAllBooks(){
        $books = Book::all();
        return view('components.books', compact('books'));
    }
}
