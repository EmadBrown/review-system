<?php

namespace App\Http\Validators;

use App\Http\Validators\AbstractFormValidator;

class AdminValidator extends AbstractFormValidator
{
 
   
    public function rules()
    {
        $this->rules = [
                  'email'   => 'required|email',
                  'password' => 'required|min:6'
         ];
        return $this->rules;
    }
    
}

