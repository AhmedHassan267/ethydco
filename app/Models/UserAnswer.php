<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

   /*  protected $perPage = 2; */
   protected $table = 'user_answer';
   public $timestamps = false;

}
