<?php

 namespace App\Service;
 
 use Mail;
use App\Admin;

class AdminService
 {
    /**
     *
     * @var Admin Model 
     */
    private $adminModel;
    
    /**
     * 
     * @param Admin $adminModel
     */
    public function __construct(
            Admin $adminModel
    )
    {
        $this->adminModel = $adminModel;
    }
    /**
     * @param array $review
     * @return array
     */
    public function contactAdmin($review) 
    {
 
         $data = array(
            'id' => $review->id,
           'name' => $review->name ,
           'rating' => $review->rating,
           'description' => $review->description,
        );
        
        Mail::send('email.contact' , $data , function($message) use ($data){
            $message->to('ec764e6eda-121801@inbox.mailtrap.io');
            $message->subject($data['id'], $data['name'], $data['rating'], $data['description']);
        });
        
        return $data;
    }
    
}
