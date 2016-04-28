<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * The book repository instance
     *
     * @var BookRepository
     */
    protected $books;

    /**
     * Create a new controller instance.
     *
     * @param BookRepository $books
     */
    public function __construct(BookRepository $books)
    {
        $this->middleware('auth');
        $this->books = $books;
    }

    /**
     * Display a list of all books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->books->getAll();
        return view('books.index', compact('books'));
    }

    /**
     * Display a form to create a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Create a new book.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $this->books->create($request->all());
        return redirect('/books');
    }


    /**
     * Display a book
     *
     * @param Book $book
     * @return mixed
     */
    public function show(Book $book)
    {
        $book = $this->books->find($book->id);
        return view('books.show', compact('book'));
    }

    /**
     * Display a form to edit a book.
     *
     * @param Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $this->authorize('edit', $book);
        $book = $this->books->find($book->id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update a book.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->books->update($request->all(), $book->id);
        return redirect('books');
    }

    /**
     * Delete a book
     *
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {

        $this->books->delete($id);
        return redirect('/books');
    }

}
