<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Chapter;
use App\Http\Requests\createChapterRequest;
use Auth;
use DB;

use App\Http\Requests;

class ChapterController extends Controller
{

    public function create(Request $request, $id){
        $book = Book::find($id);
        $author = $book->author;  
        if(!\Auth::check() || $author['id'] != Auth::user()->id) {
            return redirect('/books/'.$id);
        }
        return view('books.create_chapter')->with([
            'book' => $book,
        ]);
    }

    public function store(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'order' => 'required|numeric'
        ]);
        $book = Book::find($id);
        Chapter::create(
                ['name' => $request->input('name'), 
                'content' => $request->input('content'),
                'order' => $request->order,
                'book_id' => $book->id,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
                ]
        );
        $chapters = Chapter::where('book_id', '=', $book->id)->get();
        $book->chapters = count($chapters);
        $book->save();
        return view('books.show')->with([
            'book' => $book,
            'chapters' => $chapters
        ]);
    }

    public function show(Request $request, $book_id, $chapter_id){
        $book = Book::find($book_id);

        if (!$book) {
            return redirect('/books');
        }
        $chapter = Chapter::find($chapter_id);
    	if ($book_id == $chapter->book_id)
            return view('books.chapter')->with([
                'book' => $book,
                'chapter' => $chapter
            ]);
    	return redirect('/books/'.$book_id);
    }

    public function edit(Request $request, $book_id, $chapter_id){
        $book = Book::find($book_id);
        $chapter = Chapter::find($chapter_id);
        $author = $book->author;

        if ($author['id'] == Auth::user()->id || $chapter->book == $book) 
            return view('books.edit_chapter')->with([
                'book' => $book,
                'chapter' => $chapter
            ]);
        return redirect('/books/'.$book_id.'/chapters/'.$chapter_id);
    }

    public function update(Request $request, $book_id, $chapter_id){
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'order' => 'required|numeric'
        ]);

        $book = Book::find($book_id);
        $chapter = Chapter::find($chapter_id);

        $chapter->name = $request->input('name');
        $chapter->content = $request->input('content');
        $chapter->updated_at = new \DateTime();
        $chapter->order = $request->input('order');
        $chapter->save();

        $chapters = Chapter::where('book_id', '=', $book->id)->get();
        return view('books.show')->with([
                'book' => $book,
                'chapters' => $chapters
            ]);
    }

    public function delete(Request $request, $book_id, $chapter_id) {
        $book = Book::find($book_id);
        $chapter = Chapter::find($chapter_id);

        if (!$book) {
            return redirect('/books')->with('alert', 'Book not found');
        }

        if (!$chapter) {
            return redirect('/books/'.$book_id)->with('alert', 'Chapter not found');
        }

        $author = $book->author;
        if ($author['id'] == Auth::user()->id){
            return view('books.delete_chapter')->with([
                'book' => $book,
                'chapter' => $chapter
            ]);
        }
        return redirect('/books/'.$book_id);
    }

    public function destroy(Request $request, $book_id, $chapter_id){
        $book = Book::find($book_id);
        $chapter = Chapter::find($chapter_id);
        $author = $book->author;

        if ($author['id'] == Auth::user()->id || $chapters->book == $book){
            $chapter->delete();
            $chapters=Chapter::whereBookId($book->id)->orderBy('order')->get();

            $book->chapters = count($chapters);
            $book->save();
            return redirect('/books/'.$book_id);
        }
        return redirect('/books/'.$book_id);
    }
}