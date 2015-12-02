<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon;

class PracticeController extends Controller {
    /*----------------------------------------------------
    Examples 6-8 were from Lecture 12
    -----------------------------------------------------*/

	function getExample11() {
		$books = \App\Book::with('tags')->get();
		
		foreach($books as $book) {
			echo '<br>'.$book->title.' is tagged with: ';
			foreach($book->tags as $tag) {
				echo $tag->name.' ';	
			}
		}
	}

	function getExample10() {
		$book = \App\Book::where('title', '=', 'The Great Gatsby')->first();
		
		echo $book->title.' is tagged with : ';
		foreach($book->tags as $tag) {
			echo $tag->name.' ';
		}
		
	}

    function getExample9() {
		#eager load the authors with the books
        $books = \App\Book::all();
		
		foreach($books as $book) {
	       echo $book->author->first_name.' '.$book->author->last_name.' wrote ';
		}
		
		dump($books->toArray());
	}

    function getExample8() {
        $book = \App\Book::first();
		$author = $book->author;
        echo $book->title.' was written by '.$book->author->first_name.' '.$book->author->last_name;
		dump($book->toArray());
	}

    function getExample7() {
        $author = new \App\Author;
        $author->first_name = 'J.K';
        $author->last_name = 'Rowling';
        $author->bio_url = 'https://en.wikipedia.org/wiki/J._K._Rowling';
        $author->birth_year = '1965';
        $author->save();
        dump($author->toArray());
        $book = new \App\Book;
        $book->title = "Harry Potter and the Philosopher's Stone";
        $book->published = 1997;
        $book->cover = 'http://prodimage.images-bn.com/pimages/9781582348254_p0_v1_s118x184.jpg';
        $book->purchase_link = 'http://www.barnesandnoble.com/w/harrius-potter-et-philosophi-lapis-j-k-rowling/1102662272?ean=9781582348254';
        $book->author()->associate($author); # <--- Associate the author with this book
        //$book->author_id = $author->id;
        $book->save();
        dump($book->toArray());
		return 'Added new book.';
	}

    function getExample6() {
        // Query Responsibility
	    $books = \App\Book::orderBy('id','DESC')->get();
        $first = $books->first();
        $last  = $books->last();
        //$first = \App\Book::orderBy('id','ASC')->first();
        //$last = \App\Book::orderBy('id','DESC')->first();
        dump($books);
        dump($first);
        dump($last);
	}
    /*----------------------------------------------------
    Examples 1-5 were from Lecture 10
    -----------------------------------------------------*/
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

    function getExample0() {
        $books = \App\Book::orderBy('id','ASC')->get();
        //$first = \App\Book::orderBy('id','ASC')->first();
        //$last =  \App\Book::orderBy('id','DESC')->first();
        $first = $books->first();
        $last  = $books->last();
        dump($first->toArray());
        dump($last->toArray());
    }
}