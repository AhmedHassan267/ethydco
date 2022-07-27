<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleSpecific extends Model
{
    use HasFactory;

   /*  protected $perPage = 2; */
   protected $table = 'role_specific';
   public $timestamps = false;

}
