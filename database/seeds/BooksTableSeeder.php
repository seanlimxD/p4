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
        	['Jill Harvard', 'The Test', 3, 'https://previews.123rf.com/images/petdcat/petdcat1009/petdcat100900028/7748642-two-scientists-surprised-at-their-experiment.jpg', 'test synopsis 1'],
        	['Jamal Harvard', 'The Tester', 1, 'https://comps.canstockphoto.com/science-experiment-stock-photo_csp3755022.jpg', 'this is a test for synopsis 2'],
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
