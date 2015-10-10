<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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
    public function postCreate() {
        return 'Processed the creation of a new book: ' . $_POST['title'];
    }
}