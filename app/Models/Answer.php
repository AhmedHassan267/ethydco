<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

   /*  protected $perPage = 2; */
   protected $table = 'answer';
   public $timestamps = false;

}
