<?php

namespace App\Http\Review;

use App\Contracts\RepositoryInterface;
use App\Models\Review;

class ReviewRepository implements RepositoryInterface
{

    public function getAll()
    {
        return Review::all();
    }

    public function create($request)
    {
        return Review::create($request);
    }

    public function delete($id)
    {
        return Review::destroy($id);
    }

    public function update($request, $id)
    {
        return Review::where('id', $id)->update($request);
    }

    public function find($id)
    {
        return Review::find($id);
    }

}
