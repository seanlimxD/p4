<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
        	['test', 'The Test', 3, 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG', 'test synopsis 1'],
        	['testa', 'The Tester', 1, 'http://img1.imagesbn.com/p/9780061148514_p0_v2_s114x166.JPG', 'this is a test for synopsis 2'],
        ];

        $count = count($books);

        foreach ($books as $key => $bookData) {
        $book = new Book();

        $book->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $book->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $book->user_id = \App\User::where('name','=',$bookData[0])->pluck('id')->first();
        $book->title = $bookData[1];
        $book->chapters = $bookData[2];
        $book->cover_url = $bookData[3];
        $book->synopsis = $bookData[4];

        $book->save();
        $count--;
    	}
    }
}
