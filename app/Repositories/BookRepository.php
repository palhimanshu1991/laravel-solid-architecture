<?php

namespace App\Repositories;

use App\Models\Book;
use App\Contracts\RepositoryInterface;
use Illuminate\Http\Request;

class BookRepository implements RepositoryInterface
{

    /**
     * Get all books
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return Book::all();
    }

    /**
     * Create & store a new book
     *
     * @param $request
     * @return static
     */
    public function create($request)
    {
        $input = Collect($request)->only('title', 'author_id');

        $book = Book::create($input->all());

        // if book create
        if($book)
            // if file exists
            if($file = $request->file('cover_url'))
                // upload the book cover
                if($filename = $this->uploadBookCover($file, $book)){
                    $book->cover_url = $filename;
                    $book->save();
                }

        return $book;
    }

    /**
     * Delete a book by id
     *
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return Book::destroy($id);
    }

    /**
     * Update a book
     *
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $request = Collect($request)->only('title', 'author_id');
        return Book::where('id', $id)->update($request->all());
    }

    /**
     * Find a book by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Book::find($id);
    }

    /**
     * Common function to upload a book file
     *
     * @param $file
     * @param $book
     * @return string
     */
    public function uploadBookCover($file, $book)
    {

        // get the folder for storage
        $destination = '/books/' . $book->id;

        // get a clean filename
        $filename = str_random(16) . '.' . $file->getClientOriginalExtension();

        // absolute path
        $absolute_path = $destination . $filename;

        // move the file to the destination  file
        $storage = \Storage::put($absolute_path, file_get_contents($file->getRealPath()));

        // return filename if file is moved
        if ($storage) {
            return $filename;
        }

    }

}
