<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class UpdateBookRequest extends Request {

    use HandlesAuthorization;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {    
        $this->setMessage('You do not have the access to create a book');
        return Auth::user()->level_id === 5;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required',
            'author_id' => 'required | exists:authors,id',
        ];
    }

}
