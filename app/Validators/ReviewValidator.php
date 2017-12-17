<?php

namespace App\Http\Validators;

use App\Http\Validators\AbstractFormValidator;

class ReviewValidator extends AbstractFormValidator
{
 
   
    public function rules()
    {
        $this->rules = [
                  'name'   => 'required|min:3',
                  'rating' => 'required|integer',
                  'description' => 'required|min:6'
         ];
        return $this->rules;
    }
    
}

