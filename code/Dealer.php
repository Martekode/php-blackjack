<?php class Dealer extends Player {
    private int $treshHold = 15;
    public function hit(Deck $deck){
        if($this->getScore() < $this->treshHold){
            parent::hit();
        }
    }
}