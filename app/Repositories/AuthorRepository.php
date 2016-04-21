<?php

namespace App\Repositories;

use App\Models\Author;
use App\Contracts\RepositoryInterface;

class AuthorRepository implements RepositoryInterface {

    public function getAll() {
        return Author::all();
    }

    public function create($request) {
        return Author::create($request);
    }

    public function delete($id) {
        return Author::destroy($id);
    }

    public function update($request, $id) {
        return Author::where('id', $id)->update($request);
    }

    public function find($id) {
        return Author::find($id);
    }

}
