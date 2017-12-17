<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckReview extends Model
{
      protected $fillable = [
        'name', 'rating', 'description',
    ];
}
