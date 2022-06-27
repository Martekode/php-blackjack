<?php class Blackjack {
    private object $player;
    private object $dealer;
    private object $deck;

    public function __construct(){
        $this->player = new Player;
        $this->dealer = new Dealer;
        $this->deck = new Deck;
        //possible that it's $shuffledDeck = $this->deck->shuffle;
        $this->deck->shuffle();
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