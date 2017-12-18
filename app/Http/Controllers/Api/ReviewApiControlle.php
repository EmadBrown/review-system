<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ReviewService;

class ReviewApiControlle extends Controller
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
     * @param boolean
     */
    public function delete($id)
    {
        $this->reviewService->delete($id);
    }
    
}
