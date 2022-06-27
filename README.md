# php-blackjack
today i'm goig to try and make a php blackjack game. I suspect this is going to be defficult sinds i always have troubles using someone elses code. i will probably loose a lot of time to get what all the code already does. i'll try my best even if it fails in the end. i'll have a clearer image off OOP in return i hope...

sooo off to the task.
## important notes 
### flow:
* shuffle deck
* player ander dealer both 2 rnd cards
* first deadler card shows
* player at this stage is allowed to choose the get more cards or to stand down
* if player > 21 = loose!!!
* after the player the dealer keeps hittting until 15 points minimum after that he stands or busts
* compare card values and show winner

### instructions
#### 1/ Create a class called Player in the file Player.php.
```php
    class Player {
    
    }
```
#### 2/ Add 2 private properties: cards (array), lost (bool, default = false)
```php
    private array $cards = [];
    private bool $lost = false;
```

#### 3/ Add a couple of empty public methods to this class:
```php
    public function hit(){

    }
    public function surrender(){

    }
    public function getScore(){

    }
    public function hasLost(){

    }
```
#### 4/ Create a class called Blackjack in the file Blackjack.php
```php
class Blackjack {

}
```
#### 5/ Add 3 private properties
```php
    private object $player;
    private object $dealer;
    private object $deck;
```
#### 6/ Add the following public methods:
```php
    public function getPlayer(){
        return $this->player;
    }
    public function getDealer() {
        return $this->dealer;
    }
    public function getDeck() {
        return $this->deck;
    }
```
#### 7/ In the constructor do the following:
```php
    public function __construct(){
        $this->player = new Player;
        $this->dealer = new Player;
        $this->deck = new Deck;
        //possible that it's $shuffledDeck = $this->deck->shuffle;
        $this->deck->shuffle();
    }
```
#### 8/ In the constructor of the Player class;
```php
    $this->cards[] += $deck->drawCard();
    $this->cards[] += $deck->drawCard();
```
A lot of confusion started here... Its became difficult to understand what method was wich class or the other and also how to address certain things. because it is ez to say: "oh, yea pass the deck from the blackjack class" but it's hard to just write that down. from what blackjack object??? haven't declared it... Aperently it's Deck $deck just passing Deck as type is good enough and then later $blackjack->getDeck(); or smth..I also thought darwCard was private so that confused mee too. (how am i gonna draw a card from an object that doesn't possess that method to draw.. it's public so no problems).
#### 9/ Go back to the Player class and add the following logic in your empty methods:
##### getScore
```php
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
```
this is my first iteration of the code... this is probably not going to work. But either way it will suffise as guidance at debugging stage;
#### 10/ Creating the index.php file