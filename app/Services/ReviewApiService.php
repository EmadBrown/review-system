<?php

 namespace App\Service;

 use App\Review;

class ReviewApiService{
    
    
    /**
     * @var Review Model 
     */
    private $reivewModel;
    
    /**
     * @param Review $reivewModel
     */
    public function __construct(
        Review $reivewModel
    )
    {
        $this->reivewModel = $reivewModel;
    }
    
    /**
     * 
     * @return array
     */
    public function getData()
    {
         $data = $this->reivewModel::select('name' , 'description' , 'rating')->Where('permit' , '=' , 1)->orderBy('created_at'  ,  'desc')->paginate(5);
         return response()->json($data);
    } 
}
