<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleGame extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'single_game';

    public function levelDifficulty(){
        return $this->belongsTo(LevelDifficulty::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
