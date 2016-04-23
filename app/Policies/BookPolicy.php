<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Models\Book;

class BookPolicy extends BasePolicy {

    use HandlesAuthorization;
    
    /**
     * Determine if the given user can create the given resource.
     *
     * @param  User  $user
     * @param  Book  $book
     * @return bool
     */
    public function create(User $user) {
        return $this->ifAdmin($user);
    }    

    /**
     * Determine if the given user can edit the given resource.
     *
     * @param  User  $user
     * @param  Book  $book
     * @return bool
     */
    public function edit(User $user, Book $book) {
        return $this->ifAdmin($user);
    }

}
