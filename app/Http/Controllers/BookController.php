<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Repositories\BookRepository;

class BookController extends Controller {

    /**
     * The book repository instance
     * 
     * @var BookRepository
     */
    protected $books;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookRepository $books) {
        $this->middleware('auth');
        $this->books = $books;
    }

    /**
     * Display a list of all books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $books = $this->books->getAll();
        return view('books.index', compact('books'));
    }

    /**
     * Display a form to create a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('books.create');
    }

    /**
     * Create a new book.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreBookRequest $request) {

        $this->books->create($request->all());
        return redirect('/books');
    }

    /**
     * Display a book
     * 
     * @param type $id
     * @return type
     */
    public function show($id) {

        $book = $this->books->find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Display a form to edit a book.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book) {

        $book = $this->books->find($book->id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update a book.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateBookRequest $request, Book $book) {

        $this->books->update($request->all(), $book->id);
        return redirect('books');
    }

    /**
     * Delete a book
     * 
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id) {

        $this->books->delete($id);
        return redirect('/books');
    }

}
