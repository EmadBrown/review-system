<?php

 namespace App\Service;
 
 use App\CheckReview;
 use App\Review;

class ReviewService{
    
    /**
     * @var Review Model 
     */
    private $reivewModel;
    
    /**
    
    /**
     * @var Check Review Model 
     */
    private $checkReivewModel;
    
    /**
     * @param Review $reivewModel
     * @param CheckReview $checkReivewModel
     */
    public function __construct(
        Review $reivewModel,
        CheckReview $checkReivewModel
    )
    {
        $this->reivewModel = $reivewModel;
        $this->checkReivewModel = $checkReivewModel;
    }
    
    /**
     * 
     * @return array
     */
    public function getData()
    {
         $data = $this->checkReivewModel::orderBy('created_at'  ,  'desc')->paginate(5);
         return $data;
    }
    
    /**
     * @param array $data
     * @return array
     */
    public function save(array $data) 
    {
         $filter = $this->checkReivewModel->create($data);
        return $filter;
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $review = $this->checkReivewModel->findOrFail($id);
        return $review->delete();
    }
}
