<?php

class Player {
    private array $cards = [];
    private bool $lost = false;
    /* i don't know yet how to pass 
    the $deck parameter sinds blackjack class hasn't generated
    a new object, i don't know how to address the $deck... so
    $deck ass placeholder for now*/
    public function __construct(Deck $deck){
        $this->cards[] += $deck->drawCard();
        $this->cards[] += $deck->drawCard();
    }

    public function hit(){

    }
    public function surrender(){

    }
    public function getScore(){
        $counter = 1;
        $factors = [];
        foreach($this->cards as $key => $value){
            $factors[$counter] = $this->cards[$key]->$value[1];
            $counter++;
        }
        $sum = $factors[0] + $factors[1];
        return $sum;

    }
    public function hasLost(){

    }

}