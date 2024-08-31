<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function post_creator(){
        return $this->belongsTo(User::class,'Posted_by');
    }
     public function getDeletedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }
}
