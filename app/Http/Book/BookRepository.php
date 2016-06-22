<?php

namespace App\Http\Book;

use App\Contracts\RepositoryInterface;
use App\Models\Book;
use App\Traits\FileUploader;
use App\Traits\UserLevels;
use Illuminate\Http\Request;

class BookRepository implements RepositoryInterface
{

    use FileUploader, UserLevels;

    public function __construct()
    {

    }

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
        $params = $this->params($request);

        $book = Book::create($params);

        $this->uploadBookCover($request->file('cover_url'), $book);

        return $book;
    }

    /**
     * Return only required params from request
     *
     * @param $request
     * @return mixed
     */
    private function params($request)
    {
        return Collect($request)->only('title', 'author_id')->toArray();
    }

    /**
     * Common function to upload a book file
     *
     * @param $file
     * @param $book
     * @return string
     */
    public function uploadBookCover($file, Book $book)
    {

        // if book create
        if ($book && $file) {

            // get the folder for storage
            $destination = '/books/' . $book->id . '/';

            // get a clean filename
            $filename = str_random(16) . '.' . $file->getClientOriginalExtension();

            // absolute path
            $absolute_path = $destination . $filename;

            // move the file to the destination  file
            $storage = \Storage::put($absolute_path, file_get_contents($file->getRealPath()));

            // return filename if file is moved
            if ($storage) {

                // store the filename
                $book->cover_url = $filename;
                $book->save();

                return $filename;

            }
        }


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
        $params = $this->params($request);

        //$book = Book::where('id', $id)->update($params);

        $book = Book::find($id);

        $book->title = str_random(16);

        $book->save();

        //event(new BookWasUpdated(Book::find($id)));

        return $book;
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
}
