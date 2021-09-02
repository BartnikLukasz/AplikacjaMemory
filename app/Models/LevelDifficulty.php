<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelDifficulty extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'level_difficulty';

    public function singleGame(){
        return $this->hasMany(SingleGame::class);
    }

}
