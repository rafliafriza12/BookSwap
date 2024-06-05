<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Conversation;

class BookController extends Controller
{
    public function index(){
        return view('pages.tambahbuku',);
    }

    public function createBook(Request $request,$id){
        // ddd($request);
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension(); 
        $image->move(public_path('images'), $imageName);

        try {
            Book::create([
                'user_id' => $id,
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'image_path' => 'images/'.$imageName,
            ]);
        } catch (\Throwable $th) {
            return redirect('/tambah-buku');
        }
        return redirect('/buku-saya/'.auth()->user()->id);
    }

    public function selected($id){
        $book = Book::where('id', $id)->first();
        $user = User::where('id',$book->user_id)->first();
        return view('pages.selectedbook', compact('book','user'));
    }

    public function myBook($id){
        $books = Book::where('user_id',$id)->get();
        return view('pages.mybook', compact('books'));
    }

    public function editBookPage($id){
        $book = Book::where('id',$id)->first();
        return view('pages.editbuku', compact('book'));
    }

    public function editBook(Request $request, $id){
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $book = Book::where('id',$id)->first();
        $book->judul = $request->judul;
        $book->kategori = $request->kategori;
        $book->deskripsi = $request->deskripsi;
        if ($request->hasFile('image')) {
            // if ($book->image_path && Storage::exists('public/images/' . $book->image_path)) {
            //     Storage::delete('public/images/' . $book->image_path);
            // }

            // Simpan gambar baru
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension(); 
            $image->move(public_path('images'), $imageName);
            $book->image_path = 'images/'.$imageName;
        }
        $book->save();
        // try {
        // } catch (\Throwable $th) {
        //     return redirect('/edit-buku/'.$id);
        // }
        return redirect('/buku-saya/'.auth()->user()->id);
    }

    public function deleteBook($id){
        Book::destroy($id);
        return redirect('/buku-saya/'.auth()->user()->id);
    }

    
}
