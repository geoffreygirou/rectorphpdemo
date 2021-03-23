<?php


namespace App\JunkFood;

class PartyMeal
{
    private $partyTime;
    private $myMeal;
    private $myFriendMeal;

    public function grabIt()
    {
        if(null!==$this->myMeal) {
            return $this->myMeal;
        }

        if(null !== $this->myFriendMeal) {
            return $this->myFriendMeal;
        }

        return null;
    }

    public function kindOfMeal() : string
    {
        if( ! ($this->partyTime !== 'dinner')) {
            return 'lets have lunch';
        }

        $kindOfMeal = 'lets have dinner';
        return $kindOfMeal;
    }
}