<?php

 namespace App\Service;

 use App\Review;
 use App\Admin;
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
     * 
     * @param Review $reivewModel
     * @param NewReviewNotification $newReview
     */
    public function __construct(
        Review $reivewModel,
         Admin $adminModel
    )
    {
        $this->reivewModel = $reivewModel;
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
     * 
     * @param type $id Review
     * @return mixed
     */
    public function permitOn($id)
    {
        $review = $this->reivewModel->findOrFail($id);
        $review->permit = true;
        return $review->update();
    }
    
    /**
     * 
     * @param type $id Review
     * @return mixed
     */
    public function permitOff($id)
    {
        $review = $this->reivewModel->findOrFail($id);
        $review->permit = false;
        return $review->update();
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
