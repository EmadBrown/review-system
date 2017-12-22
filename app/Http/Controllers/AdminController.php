<?php

namespace App\Http\Controllers;
use App\Service\AdminService;
use App\Service\ReviewService;
 use Route;

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
    public function permitOn($id) 
    {
         
        $this->reviewService->permitOn($id);
        
        if(Route::currentRouteName() == 'review.permit.on')
        {
                return redirect()->back();
        }
        else
        {
                return "<script>window.close();</script>";
        }
    }
    
    /**
     * 
     * @param type $id
     */
    public function permitOff($id) 
    {
        $this->reviewService->permitOff($id);
        return redirect()->back();
    }
    
    /**
     * 
     * @param type $id
     */
    public function delete($id) 
    {
        $this->reviewService->delete($id);
        
        if(Route::currentRouteName() == 'review.delete')
        {
                return back();
        }
        else
        {
                return "<script>window.close();</script>";
        }
    }
    
}
