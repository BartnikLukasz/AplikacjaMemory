<?php

namespace App\Utilities;

use App\Models\User;

class StatisticsUtil{

    public $gamesPlayed;
    public $categoriesUnlocked;
    public $points;
    public $position;

    public function __construct($user){
        $this->gamesPlayed = $user->getTotalGames();
        $this->categoriesUnlocked = $user->getTotalUnlockedCategories();
        $this->points = $user->ranking_points;
        $this->position = $user->position;
    }

}