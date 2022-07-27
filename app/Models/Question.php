<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function role()
    {
        return $this->hasOne(Role::class,'id','role_id');
    }

    public function role_specific()
    {
        return $this->hasOne(RoleSpecific::class,'id','role_specific_id');
    }

}
