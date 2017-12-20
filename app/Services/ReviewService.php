<?php

 namespace App\Service;

 use App\Review;
 use App\Admin;
 use Notification;
 use App\Notifications\NewReviewNotification;
 use Illuminate\Support\Facades\Mail;
 use App\Mail\NewReviewMail;

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
         $review = $this->reivewModel->create($data->all());
          Mail::to('emad-33944c@inbox.mailtrap.io')->send(new NewReviewMail($review));
//         Notification::route('mail' , 'emad-33944c@inbox.mailtrap.io')->notify(new $this->newReview($review));
        return $review;
    }
    
        /**
     * @param array $data
     * @return array
     */
    public function last() 
    {
         $review = $this->reivewModel->latest()->first();
        return $review;
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
