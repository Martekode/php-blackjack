<?php 
require ('./code/Player.php');
require ('./code/Blackjack.php');
require ('./code/Card.php');
require ('./code/Deck.php');
require ('./code/Suit.php');
session_start();
if (!isset($_SESSION[$blackjack])){
    $_SESSION[$blackjack] = new Blackjack;
}
foreach($_SESSION[$blackjack]->getDeck()->getCards() AS $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
}

?>