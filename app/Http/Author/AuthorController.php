<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * The author repository instance.
     *
     * @var AuthorRepository
     */
    protected $authors;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a list of all authors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = $this->authors->getAll();

        return view('authors.index', compact('authors'));
    }

    /**
     * Display a form to create a new author.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Create a new author.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authors->create($request->all());

        return redirect('/authors');
    }

    /**
     * Display an author.
     *
     * @param type $id
     *
     * @return type
     */
    public function show($id)
    {
        $author = $this->authors->find($id);

        return view('authors.show', compact('author'));
    }

    /**
     * Display a form to edit an author.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;

        $author = $this->authors->find($id);

        return view('authors.edit', compact('author'));
    }

    /**
     * Update an author.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authors->update($request->all(), $id);

        return redirect('/authors');
    }

    /**
     * Delete an author.
     *
     * @param type $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $this->authors->delete($id);

        return redirect('/authors');
    }
}
