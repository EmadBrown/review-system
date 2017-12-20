<?php

 namespace App\Service;

 use App\Review;
 use App\Admin;
 use Notification;
 use App\Notifications\NewReviewNotification;

class ReviewService{
    
    
    /**
     * @var Review Model 
     */
    private $reivewModel;
    
    /**
     * @var Admin Model 
     */
    private $adminModel;
    
    /**
     * @var NewReviewNotification
     */
    private $newReview;
    /**
     * 
     * @param Review $reivewModel
     * @param NewReviewNotification $newReview
     */
    public function __construct(
        Review $reivewModel,
        NewReviewNotification  $newReview,
         Admin $adminModel
    )
    {
        $this->reivewModel = $reivewModel;
        $this->newReview = $newReview;
         $this->adminModel = $adminModel;
    }
    
    /**
     * 
     * @return array
     */
    public function getData()
    {
         $data = $this->reivewModel::Where('permit' , '=' , 1)->orderBy('created_at'  ,  'desc')->paginate(5);
         return $data;
    }
    
    /**
     * 
     * @return array 
     */
    public function getAdminData()
    {
         $data = $this->reivewModel::orderBy('created_at'  ,  'desc')->paginate(10);
         return $data;
    }
    
    
    /**
     * @param array $data
     * @return array
     */
    public function save($data) 
    {
         $filter = $this->reivewModel->create($data->all());
//         $this->adminModel->notify(new $this->newReview($filter));
         Notification::route('mail' , 'ec764e6eda-121801@inbox.mailtrap.io')->notify(new $this->newReview($filter));
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
