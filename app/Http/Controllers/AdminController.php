<?php

namespace App\Http\Controllers;
use App\Service\AdminService;
use App\Service\ReviewService;

class AdminController extends Controller
{
    /**
     *
     * @var ReviewService 
     */
    private $reviewService;
  
    /**
     * 
     * @param AdminService $reviewService
     */
    public function __construct(
            ReviewService $reviewService
    )
    {
        $this->middleware('auth:admin');
        $this->reviewService = $reviewService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index')->withReviews($this->reviewService->getAdminData());
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
    
    
//    public function switching()
//    {
//        echo 'switching';
//    }
}
