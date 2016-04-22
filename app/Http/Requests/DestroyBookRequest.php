<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class DeleteBookRequest extends Request
{
    use HandlesAuthorization;

    protected $user;

    public function __construct(\App\User $user) {
        $this->user = Auth::user();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if ($this->user->id === 2)
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
            //
        ];
    }

}