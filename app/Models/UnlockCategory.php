<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnlockCategory extends Model
{
    use HasFactory;

    protected $table = 'unlock_category';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
