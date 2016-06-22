<?php

namespace App\Http\User;

use App\Contracts\RepositoryInterface;
use App\User;

class UserRepository implements RepositoryInterface
{

    public function getAll()
    {
        return User::all();
    }

    public function create($request)
    {
        return User::create($request);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function update($request, $id)
    {
        return User::where('id', $id)->update($request);
    }

    public function find($id)
    {
        return User::find($id);
    }

}
