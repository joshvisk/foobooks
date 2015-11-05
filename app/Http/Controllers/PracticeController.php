<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PracticeController extends Controller {
    function getExample7() {
        $book = new \App\Book();
        $results = $book->where('published', '<', 1950)->first();
        echo $results->title;
    }
    function getExample6() {
        $book = new \App\Book();
        $book_to_update = $book->find(1);
        $book_to_update->title = 'Green Eggs and Ham';
        $book_to_update->save();
    }
    function getExample5() {
        $book = new \App\Book();
        $harry_potter = $book->find(8);
        $harry_potter->delete();
    }
    function getExample4() {
        $book = new \App\Book();
        $book->title = 'Harry Potter';
        $book->author = 'J.k Rowling';
        $book->save();
        return 'Example 4';
    }
    function getExample3() {
        $books = new \App\Book();
        $all_books = $books->all();
        foreach($all_books as $book) {
            echo $book->title.'<br>';
        }
        return 'Example 3';
    }
    function getExample2() {
        // Equivalent to: SELECT * FROM books
        $books = \DB::table('books')->get();
        foreach($books as $book) {
            echo $book->title.'<br>';
        }
        return 'Example 2';
    }
    function getExample1() {
        \DB::table('books')->insert([
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'published' => 1925,
            'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
            'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
        ]);
        return 'Example 1';
    }
}