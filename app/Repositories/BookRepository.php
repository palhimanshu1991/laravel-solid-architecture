<?php

namespace App\Repositories;

use App\Models\Book;
use App\Contracts\RepositoryInterface;
use Illuminate\Http\Request;

class BookRepository implements RepositoryInterface {

    public function getAll() {
        return Book::all();
    }

    public function create($request) {
        return Book::create($request);
    }

    public function delete($id) {
        return Book::destroy($id);
    }

    public function update($request, $id) {
        $request = Collect($request)->only('title', 'author_id');
        return Book::where('id', $id)->update($request->all());
    }

    public function find($id) {
        return Book::find($id);
    }

}
