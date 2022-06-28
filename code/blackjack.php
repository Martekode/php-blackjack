<?php class Blackjack {
    private Player $player;
    private Dealer $dealer;
    private Deck $deck;
    private int $blackJack = 21;
    private string $message = "lala";
    private int $threshHold = 15;

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
    public function messaging():string{
        if($this->getPlayer()->getScore() > $this->blackJack){
            $this->message = "Player Busted: " . $this->getPlayer()->getScore().", Dealer wins!!";
            return $this->message;
        }
        elseif($this->getDealer()->getScore() > $this->blackJack){
            $this->message = "Dealer Busted: " . $this->getDealer()->getScore() . ", Player wins!!";
            return $this->message;
        }
        elseif($this->getPlayer()->getScore() == $this->getDealer()->getScore()){
            $this->message = "It's a Draw";
            return $this->message;
        }
        elseif(!isset($_POST['stand'])){
            $this->message = "game still going on";
            return $this->message;
        }
        elseif(isset($_POST['stand'])){
            if($this->getPlayer()->getScore() > $this->getDealer()->getScore()){
                $this->message = "Player Wins";
                return $this->message;
            }elseif($this->getPlayer()->getScore() < $this->getDealer()->getScore()){
                $this->message = "Dealer Wins";
                return $this->message;
            }
        }
        return $this->message;
    }
    public function restart(){
        $this->deck = new Deck() ;
        $this->deck->shuffle();
        $this->player = new Player($this->deck) ;
        $this->dealer = new Dealer($this->deck) ;
    }
}