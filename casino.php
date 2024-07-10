<?php
declare(strict_types=1);
?>
<h1>Max's Online Casino</h1>

<h3>Shootin' Dice</h3>
<?php
$diceRoll1 = rand(1, 6);
    echo "You got $diceRoll1<br />";
$diceRoll2 = rand(1, 6);
echo "House got $diceRoll2<br />";
function shootinDice($diceRoll1, $diceRoll2) {
    if ($diceRoll1 == $diceRoll2)
        echo 'Draw! Shoot again!';
    elseif ($diceRoll1 > $diceRoll2)
        echo 'You win!';
    elseif ($diceRoll1 < $diceRoll2)
        echo 'House wins! Cough up!';
}

echo shootinDice($diceRoll1, $diceRoll2)


?>
<?php
//// DICE ROLL
//$diceRoll = rand(1, 6);
//$count = 1;
//
//while ($diceRoll !== 6) {
//    echo "Bad luck, you rolled a $diceRoll <br />";
//    $diceRoll = rand(1, 6);
//    $count++;
//}
//
//echo "Yay, you rolled a 6 and it took $count rolls!";
//
//if ($count > 10) {
//    echo "<br />You should probably buy a lottery ticket!";
//}
//?>

<h3>Coin Toss</h3>
<?php
$randomNo1 = rand(0, 1);
if ($randomNo1 === 1) {
    echo 'You got Heads!<br />';}
    else {
    echo 'You got Tails!<br />';
    }

$randomNo2 = rand(0, 1);
if ($randomNo2 === 1) {
    echo 'House got Heads!<br />';}
else {
    echo 'House got Tails!<br />';
}

function coinToss($randomNo1, $randomNo2) {
    if ($randomNo1 === $randomNo2)
        echo 'Its a Draw! Try again!';
    elseif ($randomNo1 > $randomNo2)
        echo 'You win!';
    elseif ($randomNo1 < $randomNo2)
        echo 'House wins!';
}

echo coinToss($randomNo1, $randomNo2)



?>

<h3>Black Jack</h3>
<?php
function getBlackjackWinner($player1, $player2 = '') {
    if ($player1 > 21)
        echo "House Wins!";
    elseif ($player2 > 21)
        echo "You Win";
    elseif ($player1 > $player2)
        echo "You win!";
    elseif ($player1 < $player2)
        echo "House wins!";
    elseif ($player2 = $player1)
        echo "Its a draw... Boo!";
}

$player1 = rand(1, 23);
echo "You get $player1 <br />";
$player2 = rand(1, 23);
echo "House got $player2 <br />";

echo getBlackjackWinner($player1, $player2);
?>
<br>
<h3>New Game.</h3>
<?php
