<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Validators\ReviewValidator;
use App\Service\ReviewService;
 use Illuminate\Support\Facades\Session;
 use App\Service\AdminService;

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
     * @var AdminService 
     */
    private $contactAdmin;
    
    /**
     * 
     * @param ReviewValidator $formValidator
     * @param ReviewService $reviewService
     * @param AdminService $contactAdmin
     */
    public function __construct(
          ReviewValidator $formValidator,
          ReviewService $reviewService,
          AdminService $contactAdmin
    )
    {
          $this->formValidator = $formValidator;
          $this->reviewService = $reviewService;
          $this->contactAdmin = $contactAdmin;
    }
    
    /**
     * 
     * @return array
     */
    public function index() 
    {
        return view('pages.index')->withReviews($reviews = $this->reviewService->getData());
    }
    
    /**
     * @param Request $request
     */
    public function add(Request $request) 
    {
        if($request->isMethod ('post'))
        {
                $this->formValidator->validateRequest($request);
               if ($this->formValidator->isValid()) 
               {
                   $this->contactAdmin->contactAdmin($this->reviewService->save($this->formValidator->getData()));
                       Session::flash('success','The Review has successfully Added.');
                       return redirect()->route('home');
               }
               else   
                {
                       $errors= $this->formValidator->getErrors();
                       return redirect()->route('review.add')->withErrors($errors);
               }
        }
        else{
            return view('pages.add');
        }
    }
}
