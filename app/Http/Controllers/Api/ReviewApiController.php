<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\ReviewApiService;



class ReviewApiController extends Controller
{
    /**
     * @var ReviewApiService 
     */
    private $reviewApiService;

    /**
     * @param ReviewService $reviewApiService
     */
    public function __construct(
          ReviewApiService $reviewApiService
    )
    {
          $this->reviewApiService = $reviewApiService;
    }
    
    /**
     * 
     * @return json
     */
    public function index() 
    {
        return $this->reviewApiService->getData();
    }
}
