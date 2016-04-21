<?php

namespace App\Repositories;

use App\User;
use App\Contracts\RepositoryInterface;

class UserRepository implements RepositoryInterface {

    public function getAll() {
        return User::all();
    }

    public function create($request) {
        return User::create($request);
    }

    public function delete($id) {
        return User::destroy($id);
    }

    public function update($request, $id) {
        return User::where('id', $id)->update($request);
    }

    public function find($id) {
        return User::find($id);
    }

}
