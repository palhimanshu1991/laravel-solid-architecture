<?php

namespace App\Http;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Contracts\Validation\Validator;

abstract class Request extends FormRequest {

    use HandlesAuthorization;
    
    public function __construct() {
       
    }

    /**
     * Message to be displayed
     * @var string 
     */
    protected $message;

    /**
     * 
     * @return Response
     */
    public function forbiddenResponse() {        
        return $this->deny($this->message);
    }

    /**
     * Set the message
     * 
     * @param String $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }
    
//    public function failedValidation(Validator $validator) {
//        dd($validator);
//    }

}
