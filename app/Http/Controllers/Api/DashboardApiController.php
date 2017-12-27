<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\AdminService;
 

class DashboardApiController extends Controller
{
    /**
     * @var AdminService 
     */
    private $adminService;

    /**
     * @param ReviewService $adminService
     */
    public function __construct(
          AdminService $adminService
    )
    {
        $this->middleware('auth:admin');
        $this->adminService = $adminService;
    }
    
    /**
     * 
     * @return json
     */
    public function index() 
    {
            return view('admin.index')->withReviews($this->adminService->getData());
    }
    
}
