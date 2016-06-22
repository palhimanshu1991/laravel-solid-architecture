<?php

namespace App\Http\Book\Requests;

use App\Http\Request;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UpdateBookRequest extends Request
{

    use HandlesAuthorization;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->setMessage('You do not have the access to create a book');
        return Auth::user()->level_id === 5;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'author_id' => 'required | exists:authors,id',
        ];
    }

}
