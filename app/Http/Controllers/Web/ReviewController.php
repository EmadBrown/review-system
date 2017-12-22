<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Service\ReviewService;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{

    /**
     * @var ReviewService 
     */
    private $reviewService;

    /**
     * @param ReviewService $reviewService
     */
    public function __construct(
          ReviewService $reviewService
    )
    {
          $this->reviewService = $reviewService;
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
    public function add(ReviewRequest $request ) 
    {
            $this->reviewService->save($request);
            return redirect()->route('home')->with('status' , 'The Review has successfully Added.');
    }
    
    /**
     * 
     * @return view
     */
    public function create()
    {
        return view('pages.add');
    }

}
