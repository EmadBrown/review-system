<?php

 namespace App\Service;

 use App\Review;
 
class AdminService
{
    /**
     *
     * @var Review Model 
     */
    private $reviewModel;
    
    /**
     * 
     * @param Review $reviewModel
     */
    public function __construct(
        Review $reviewModel 
    )
    {
        $this->reviewModel = $reviewModel;
    }
    
    /**
     * 
     * @return json
     */
    public function getData() 
    {
         $data = $this->reviewModel::paginate(10);
         return response()->json($data);
    }
}
