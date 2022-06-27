<?php 
require ('./code/Player.php');
require ('./code/Blackjack.php');
require ('./code/Card.php');
require ('./code/Deck.php');
require ('./code/example.php');
require ('./code/Suit.php');

if (!$_SESSION[$blackjack]){
    $_SESSION[$blackjack] = new Blackjack;
}

?>