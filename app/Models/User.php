<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'user';

    protected $attributes = [
        'role_id' => 1,
        'position' => 0,
        'ranking_points' => 0,
        'deleted' => 0,

     ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function singleGame(){
        return $this->hasMany(SingleGame::class);
    }

    public function category(){
        return $this->hasMany(Category::class);
    }

    public function unlockCategory(){
        return $this->hasMany(UnlockCategory::class);
    }

}
