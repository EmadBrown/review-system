<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Service\ReviewService;
use Illuminate\Support\Facades\Session;
use App\Service\AdminService;
use App\Http\Requests\ReviewRequest;
 

class ReviewController extends Controller
{

    /**
     * @var ReviewService 
     */
    private $reviewService;
    
    /**
     * @var AdminService 
     */
    private $contactAdmin;
    
    /**
     * @param ReviewService $reviewService
     * @param AdminService $contactAdmin
     */
    public function __construct(
          ReviewService $reviewService,
          AdminService $contactAdmin
    )
    {
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
     * @param ReviewReques $request
     */
    public function add(ReviewRequest $request) 
    {
  
            $this->reviewService->save($request);
            return redirect()->route('home')->with('status' , 'The Review has successfully Added.');
    }
    
    /**
     * 
     * @param type $id
     */
    public function delete($id) 
    {
        $this->reviewService->delete($id);
        
        return redirect()->route('home');
    }
}
