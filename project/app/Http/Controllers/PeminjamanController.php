<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Book;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;

class PeminjamanController extends Controller
{
    public function index($id){
        $books = Peminjaman::where('peminjam_id', $id)
        ->join('books', 'peminjaman.book_id', '=', 'books.id')
        ->select('peminjaman.id','peminjaman.peminjam_id','peminjaman.book_id','peminjaman.tanggal_peminjaman', 'peminjaman.tanggal_pengembalian', 'books.judul', 'books.image_path')
        ->get();
        // $books = Peminjaman::where('user_id', $id)->get();

        return view('pages.keranjang', compact('books'));
    }

    public function borrow(Request $request,$id){
        $validateData = $request->validate([
            'tanggal_peminjaman' => ['required', 'date', 'after_or_equal:today'],
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
        ]);

        Peminjaman::create([
            'peminjam_id' => auth()->user()->id,
            'book_id' => $id,
            'tanggal_peminjaman' => $validateData['tanggal_peminjaman'],
            'tanggal_pengembalian' => $validateData['tanggal_pengembalian'],
        ]);
        $book = Book::where('id',$id)->first();
        $book->status = 'n';
        $book->save();

        $user = User::where('id',$book->user_id)->first();

        $message = "Halo, ".$user->name."\n".
        "Saya ingin meminjam buku anda, detail peminjaman : \n".
        "Judul : ".$book->judul."\n".
        "Kategori : ".$book->kategori."\n".
        "Tanggal Peminjaman : ".$validateData['tanggal_peminjaman']."\n".
        "Tanggal Pengembalian : ".$validateData['tanggal_pengembalian']."\n";

        $conversation = Conversation::where('sender_id', auth()->user()->id)
        ->where('receiver_id',$book->user_id)->orWhere(function ($query) use ($book){
            $query->where('sender_id', $book->user_id)
                ->where('receiver_id', auth()->user()->id);
        })->first();
        if($conversation == null){
            $newConversation = new Conversation();
            $newConversation->sender_id = auth()->user()->id;
            $newConversation->receiver_id = $book->user_id;
            $newConversation->save();

            Message::create([
                'conversation_id' => $newConversation->id,
                'sender_id' => auth()->user()->id,
                'message' => $message
            ]);
        }else{
            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => auth()->user()->id,
                'message' => $message
            ]);
        }
        return redirect('/chat/'.$book->user_id);
        try {
        } catch (\Throwable $th) {
            return redirect('/selected-book/'.$id);
        }
    }

    public function getBack($id, $book_id){
        $book = Book::where('id', $book_id)->first();
        $book->status = 'y';
        $book->save();
        $peminjaman = Peminjaman::where('id',$id)->first();
        $user = User::where('id',$book->user_id)->first();

        $message = "Halo, ".$user->name."\n".
        "Saya sudah mengembalika buku anda \n".
        "Judul : ".$book->judul."\n".
        "Kategori : ".$book->kategori."\n".
        "Tanggal Peminjaman : ".$peminjaman->tanggal_peminjaman."\n";

        $conversation = Conversation::where('sender_id', auth()->user()->id)
        ->where('receiver_id',$book->user_id)->orWhere(function ($query) use ($book){
            $query->where('sender_id', $book->user_id)
                ->where('receiver_id', auth()->user()->id);
        })->first();
        if($conversation == null){
            $newConversation = new Conversation();
            $newConversation->sender_id = auth()->user()->id;
            $newConversation->receiver_id = $book->user_id;
            $newConversation->save();

            Message::create([
                'conversation_id' => $newConversation->id,
                'sender_id' => auth()->user()->id,
                'message' => $message
            ]);
        }else{
            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => auth()->user()->id,
                'message' => $message
            ]);
        Peminjaman::destroy($id);

        return redirect('/chat/'.$user->id);
    }
}
}
