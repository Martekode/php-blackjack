<?php class Blackjack {
    private object $player;
    private object $dealer;
    private object $deck;

    public function __construct($deck){
        $this->player = new Player;
        $this->dealer = new Dealer;
        $this->deck = $deck;
    }

    public function getPlayer(){
        return $this->player;
    }
    public function getDealer() {
        return $this->dealer;
    }
    public function getDeck() {
        return $this->deck;
    }
}