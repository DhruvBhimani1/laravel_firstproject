<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "user";
    protected $primaryKey = "user_id";
    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = ucwords($value);
    } 
}
