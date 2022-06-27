<?php class Dealer extends Player {
    private int $treshHold = 15;
    public function dealerHit($cardsArray,Deck $deck){
        if(getScore($cardsArray)< $this->treshHold){
            $this->cards[] += $deck->drawCard();
        }
        else{
            parent::hit();
        }
    }
}