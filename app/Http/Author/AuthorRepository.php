<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\Author;

class AuthorRepository implements RepositoryInterface
{
    public function getAll()
    {
        return Author::all();
    }

    public function create($request)
    {
        return Author::create($request);
    }

    public function delete($id)
    {
        return Author::destroy($id);
    }

    public function update($request, $id)
    {
        return Author::where('id', $id)->update($request);
    }

    public function find($id)
    {
        return Author::find($id);
    }
}
