<?php class Dealer extends Player {
    private int $treshHold = 15;
    public function hit(Deck $deck):void{
        if($this->getScore() < $this->treshHold){
            parent::hit($deck);
        }
    }
}