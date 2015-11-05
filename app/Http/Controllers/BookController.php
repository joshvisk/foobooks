<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

class BookController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
    	return 'List all of the books';
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($title = null) {
    	//return 'View the book: ' . $title;

		return view('books.show') -> with('title', $title);
		
		// resources/views
		// books/
		// show.blade.php
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
			return view('books.create');
		}

    /**
     * Responds to requests to POST /books/create
     */
		public function postCreate(Request $request) {
	
			// Validate the request data
			$this->validate($request, [
					'title' => 'required|min:3',
			]);
	
			// If the code makes it here, you can assume the validation passed
			$title = $request->input('title');
	
			// Code would go here to add the book to the database
	
			// Then you'd give the user some sort of confirmation:
			return 'Process adding new book: '.$title;
		}
}