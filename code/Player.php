<?php

class Player {
    private array $cards = [];
    private bool $lost = false;
    private int $blackJack = 21;
    /* i don't know yet how to pass 
    the $deck parameter sinds blackjack class hasn't generated
    a new object, i don't know how to address the $deck... so
    $deck ass placeholder for now*/
    public function __construct(Deck $deck){
        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();
    }

    public function hit(Deck $deck):void{
        $this->cards[] = $deck->drawCard();
        if($this->getScore($this->cards) > $this->blackJack){
            $this->lost = true;
        }
    }
    public function surrender(){
        $this->lost = true;
    }
    public function getScore():int{
        $score = 0;
        foreach($this->cards as $card){
           $score += $card->getValue();
        }
        return $score;

    }
    public function setLost($lost){
        $this->lost = $lost;
    }
    public function hasLost(): bool{
        return $this->lost;
    }
    public function getCards() : array
    {
        return $this->cards;
    }

}