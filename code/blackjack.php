<?php class Blackjack {
    private Player $player;
    private Dealer $dealer;
    private Deck $deck;

    public function __construct(){
        $this->deck = new Deck() ;
        $this->deck->shuffle();
        $this->player = new Player($this->deck) ;
        $this->dealer = new Dealer($this->deck) ;
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