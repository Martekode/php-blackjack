<?php 
require ('./code/Player.php');
require ('./code/Dealer.php');
require ('./code/Blackjack.php');
require ('./code/Card.php');
require ('./code/Deck.php');
require ('./code/Suit.php');
session_start();
if (!isset($_SESSION['blackjack'])){
    $_SESSION['blackjack'] = new Blackjack;
}
// foreach($_SESSION['blackjack']->getDeck()->getCards() AS $card) {
//     echo $card->getUnicodeCharacter(true);
//     echo '<br>';
// }

//logic for buttons
if(isset($_POST['hit'])){
    $_SESSION['blackjack']->getPlayer()->hit($_SESSION['blackjack']->getDeck());
}
if(isset($_POST['restart'])){
    $_SESSION['blackjack']->restart();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>blackjack</title>
</head>
<body>
   <form style="text-align:center;" method="post">
        <button name="hit">hit</button>
        <button name="stand">stand</button>
        <button name="surrender">surrender</button>
        <button name="restart">restart</button>
   </form> 
   <div style="text-align:center; font-size:30px;" class="message">
    <?= $_SESSION['blackjack']->messaging() ?>
   </div>
   <div class="container">
        <div class="row">
            <?php foreach($_SESSION['blackjack']->getPlayer()->getCards() AS $card):?>
                <div style="text-align:center; font-size:100px;" class="card col-lg-3">
                    <?= $card->getUnicodeCharacter(true);?>
                </div>    
            <?php endforeach;?>
        </div>
   </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>