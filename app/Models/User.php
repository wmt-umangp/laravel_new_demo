<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
use Storage;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guards="admin";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function getProfileImgPathAttribute($profile_img_path){
        $folder='public/images/User-'.Auth::user()->id.'/';
        if($profile_img_path){
            if($profile_img_path=='dummy-image.jpg'){
                $profile_img_path=Storage::disk('local')->url('public/'.$profile_img_path);
            }
            else{
                $profile_img_path = Storage::disk('local')->url($folder.$profile_img_path);
            }
        }
        return $profile_img_path;
    }
}
