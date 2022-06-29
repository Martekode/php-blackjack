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
    if($_SESSION['blackjack']->getPlayer()->getScore() >= 21){
        echo "you are busted so no more hitting, try restart";
    }else{
        $_SESSION['blackjack']->getPlayer()->hit($_SESSION['blackjack']->getDeck());
        unset($_POST['hit']);
    }

}
if(isset($_POST['restart'])){
    $_SESSION['blackjack']->restart();
}
if(isset($_POST['stand'])){
    $_SESSION['blackjack']->getDealer()->hit($_SESSION['blackjack']->getDeck());
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
        <button class="btn-success" name="hit">hit</button>
        <button class="btn-warning" name="stand">stand</button>
        <button class="btn-danger" name="surrender">surrender</button>
        <button class="btn-info" name="restart">restart</button>
   </form> 
   <div style="text-align:center; font-size:30px;" class="message">
    <?= $_SESSION['blackjack']->messaging() ?>
   </div>
   <div class="container">
        <h1>You: <?= $_SESSION['blackjack']->getPlayer()->getScore() ?></h1>
        <div class="row">
            <?php foreach($_SESSION['blackjack']->getPlayer()->getCards() AS $card):?>
                <div style="text-align:center; font-size:100px;" class="card col-lg-3">
                    <?= $card->getUnicodeCharacter(true);?>
                </div>    
            <?php endforeach;?>
        </div>
        <h1>Da House: <?php
                if(isset($_POST['stand']) || $_SESSION['blackjack']->getPlayer()->hasLost()){
                    echo $_SESSION['blackjack']->getDealer()->getScore();
                }else{
                    echo "???";
                }
            ?>
        </h1>
        <div class="row">
            <?php if(!isset($_POST['stand'])):?>
                <div style="text-align:center; font-size:100px;" class="card col-lg-3">
                    <?= $_SESSION['blackjack']->getDealer()->getCards()[0]->getUnicodeCharacter(true);?>
                </div>
            <?php endif;?>
            <?php if (isset($_POST['stand']) || $_SESSION['blackjack']->getPlayer()->hasLost()):?>
                <?php foreach ($_SESSION['blackjack']->getDealer()->getCards() AS $card):?>
                    <div style="text-align:center; font-size:100px" class="card col-lg-3">  
                        <?= $card->getUnicodeCharacter(true); ?>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
   </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>