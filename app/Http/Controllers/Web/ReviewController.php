<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Validators\ReviewValidator;
use App\Service\ReviewService;
 use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    /**
     * @var ReviewValidator 
     */
    private $formValidator;
    /**
     * @var ReviewService 
     */
    private $reviewService;
    
    /**
     * 
     * @param ReviewValidator $formValidator
     * @param ReviewService $reviewService
     */
    public function __construct(
          ReviewValidator $formValidator,
          ReviewService $reviewService
    )
    {
          $this->formValidator = $formValidator;
          $this->reviewService = $reviewService;
    }
    /**
     * @param Request $request
     */
    public function add(Request $request) 
    {
         $viewData = [];
         $this->formValidator->validateRequest($request);
        if ($this->formValidator->isValid()) 
        {
                $this->reviewService->save($this->formValidator->getData());
                Session::flash('success','The Review has successfully Added.');
                return redirect()->route('home');
        }
        else   
         {
                $errors= $this->formValidator->getErrors();
                return redirect()->route('home')->withErrors($errors);
        }
    }
}
