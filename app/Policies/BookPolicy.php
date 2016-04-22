<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Models\Book;

class BookPolicy {

    use HandlesAuthorization;

    /**
     * Determine if the given user can update the given resource.
     *
     * @param  User  $user
     * @param  Book  $book
     * @return bool
     */
    public function update(User $user, Book $book) {
        return true;
    }

    /**
     * Determine if the given user can update the given resource.
     *
     * @param  User  $user
     * @param  Book  $book
     * @return bool
     */
    public function destroy(User $user, Book $book) {
        return true;
    }

}
