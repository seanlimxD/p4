<?php

use Illuminate\Database\Seeder;
use App\Chapter;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chapters = [
        	['test1', 1, 'test one', 1],
        	['test2', 1, 'test two', 2],
        	['test3', 1, 'test three', 3],
        	['testa1', 2, 'testa one', 1],
        ];

        $count = count($chapters);

        foreach ($chapters as $key => $chapterData) {
        $chapter = new Chapter();

        $chapter->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $chapter->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
        $chapter->name = $chapterData[0];
        $chapter->content = $chapterData[2];
        $chapter->book_id = $chapterData[1];
        $chapter->order = $chapterData[3];

        $chapter->save();
        $count--;
    	}
    }
}
