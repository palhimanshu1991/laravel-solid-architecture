<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class StoreBookRequest extends Request {

    use HandlesAuthorization;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (Auth::user()->id === 1)
            return true;
        else
            $this->deny();
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
