<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable=[
        'roll_no','name','standard','age','user_id','email'
    ];
    use HasFactory;
    //accessor
    public function getStandardAttribute($value){
        if ($value==1) {
            return $value."st";
        }
        else if($value==2){
            return $value."nd";
        }
        else if($value==3){
            return $value."rd";
        }
        else{
            return $value."th";
        }
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
