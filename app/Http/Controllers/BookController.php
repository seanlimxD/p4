<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Book;

use App\Chapter;

use App\Http\Requests\CreateBookRequest;

use Illuminate\Auth\AuthManager;

use Auth;

use DB;

class BookController extends Controller
{
    /**
    * Responds to requests to GET /index
    */
    public function index() {
    	$user = Auth::user();
		$mybooks = null;
    	if($user) {
	    	$userid = $user->id;
	    	$mybooks = Book::where('user_id', '=', $userid)->get();	
    	}
    	$books = Book::with('user')->orderBy('updated_at', 'desc')->get();
        return view('books.index')->with([
            'books' => $books,
            'mybooks' => $mybooks
        ]);
    }

    public function getAbout() {
    	return view('books.about');
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function create() {
        if(!\Auth::check()) {
        	\Session::flash('message', 'You have to be logged in to create a new book');
        	return redirect('/login');
        }
        return view('books.create');
    }

	/**
	 * Responds to requests to POST /books/create
	 */
	public function store(Request $request) {
	    Book::create(
	    		['title' => $request->input('title'), 
	    		'cover_url' => $request->input('cover_url'),
	    		'synopsis' => $request->input('synopsis'),
	    		'created_at' => new \DateTime(),
	    		'updated_at' => new \DateTime(),
	    		'user_id' => Auth::user()->id,
	    		]
	    );
	    return redirect('/');
	}

    /**
     * Responds to requests to GET /books/{id}
     */
	public function show(Request $request, $id){
        $book = Book::find($id);
    	$chapters = Chapter::where('book_id', '=', $id)->orderBy('order')->get();
    	return view('books.show')->with([
            'book' => $book,
            'chapters' => $chapters
        ]);
    }

    public function edit(Request $request, $id){
        $book = Book::find($id);
        $author = $book->user;
        if (Auth::check()){
        	if ($author['id'] == Auth::user()->id) return view('books.edit')->with([
                'book' => $book,
            ]);	
        }
        return "You do not have sufficient permissions to edit this book.";
    }

    public function update(Request $request, $id){
        $book = Book::find($id);

        $book->title = $request->input('title');
        $book->cover_url = $request->input('cover_url');
        $book->synopsis = $request->input('synopsis');
        $book->updated_at = new \DateTime();
        $book->save();
        $chapters = Chapter::where('book_id', '=', $book->id)->orderBy('order')->get();
    	return redirect('/books/'.$id);
    }

    /**
    * GET
    * Page to confirm deletion
    */
    public function confirmDeletion(Request $request, $id) {
        $book = Book::find($id);

        $author = $book->user;  
        if ($author['id'] == Auth::user()->id){
            return view('books.delete')->with('book', $book);
        }
        return "You do not have sufficient permissions to delete this chapter.";
    }

    public function destroy(Request $request, $id){
        $book = Book::find($id);
        $author = $book->user;  
        if ($author['id'] == Auth::user()->id){
            $book->delete();
            return redirect("/");
        }
        return "You do not have sufficient permissions to delete this book.";
    }
}	