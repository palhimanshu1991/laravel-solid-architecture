<?php

namespace App\Http;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    /**
     * Message to be displayed.
     *
     * @var string
     */
    protected $message;

    /**
     * @return Response
     */
    public function forbiddenResponse()
    {
        return $this->deny($this->message);
    }

    /**
     * Set the message.
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

//    public function failedValidation(Validator $validator) {
//        dd($validator);
//    }
}
