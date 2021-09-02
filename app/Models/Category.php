<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'category';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function unlockCategory(){
        return $this->hasOne(UnlockCategory::class);
    }

    public function picture(){
        return $this->hasMany(Picture::class);
    }

}
