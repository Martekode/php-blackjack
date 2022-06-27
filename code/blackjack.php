<?php class Blackjack {
    private Player $player;
    private Dealer $dealer;
    private Deck $deck;

    public function __construct(Deck $deck){
        $this->player = new Player() ;
        $this->dealer = new Dealer() ;
        $this->deck = new Deck() ;
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