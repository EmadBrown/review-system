<?php

 namespace App\Service;

 use App\Review;

class ReviewService{
    
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
         $data = $this->reivewModel::orderBy('created_at'  ,  'desc')->paginate(5);
         return $data;
    }
    
    /**
     * @param array $data
     * @return array
     */
    public function save($data) 
    {
         $filter = $this->reivewModel->create($data->all());
        return $filter;
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $review = $this->reivewModel->findOrFail($id);
        return $review->delete();
    }
}
