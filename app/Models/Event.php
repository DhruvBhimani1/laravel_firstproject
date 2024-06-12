<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = "event";
    protected $primaryKey = "event_id";
    public function events(){
        // return $this->hasOne(User::class,'user_id','author_id');
        return $this->hasMany(User::class,'user_id','author_id');
    }
}
