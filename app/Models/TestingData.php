<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingData extends Model
{
    use HasFactory;

   /*  protected $perPage = 2; */
   protected $table = 'test_data';
   public $timestamps = false;

}
