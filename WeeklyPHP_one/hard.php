<link rel="stylesheet" href="/css/styles.css">
<?php
 // **************this is the easy Challenge*******************************************************
  $suits = array("clubs","diamonds","hearts","spades");
  $faces = array(
  "Ace" => 1, "2" => 2,"3" => 3, "4" => 4, "5" => 5, "6" => 6, "7" => 7,
  "8" => 8, "9" => 9, "10" => 10, "Jack" => 11, "Queen" => 12, "King" => 13);
  $deck = array();
// for each suit as suit so "clubs","diamonds","hearts","spades"
//make a suit.
  foreach($suits as $suit) {
    /// for each face == give its value so  "clubs" 1-13 etc...
    foreach ($faces as $face => $value) {
      //deck will be face and suit = value this is the array.
      $deck["$face of $suit"] = $value;
    }
  }

  /// preserves the font width,spaces and line breaks,
  // makes it neat specially the array.
  echo "<pre>";
  // prints human readable version of a variable.
  print_r($deck);
  echo "</pre>";




  //***************************MEDIUM**********************************************************
//turn associative array into a numeric array for the shuffled deck
function shuffleDeck($deck) {
  $keys= array_keys($deck);
  shuffle($keys);
  return array_merge(array_flip($keys), $deck);
}

echo "<pre>";
echo "shuffled ";
print_r($deck);
echo "<pre>";

$cardsPerUser = 5;
// $shuffledDeckLength = count($shuffledDeckLength);
// $numbOfCardsToDistribute = (($shuffledDeckLength - $cardsPerUser) -1);
// echo $numbOfCardsToDistribute;
// function dealCards($shuffledDeck, $cardsPerUser, $numbOfCardsToDistribute) {
//     $userHand = array();
//     echo 'pre: '.count($shuffledDeck);
//     $usersHand = array_splice($shuffledDeck, $numbOfCardsToDistribute);
//     echo ' seize of Deck: '.count($shuffledDeck);
//     print_r($shuffledDeck);
//       echo "<pre>";
//       print_r($usersHand);
//       echo "<pre>";
//     echo "suffle ";
//     print_r($shuffledDeck);
// }
// $deal = dealCards($shuffledDeck, $cardsPerUser, $numbOfCardsToDistribute);
//
            // **************************HARD Challenge**************************************
function dealCards($numberOfCards) {
  global $deck;
  $cardDealer=[];

for ($i = 0; $i < $numberOfCards; $i++) {
  $key = array_keys($deck);
  $topCardName = $key[0];
  $topcardVal = array_shift($deck);
  $cardDealer[$topCardName] = $topcardVal;
 }
return $cardDealer;

}
$deck = shuffleDeck($deck);

$playersArr = [
  "player1" => [],
  "player2" => [],
  "player3" => [],
  "player4" => [],
];

//& = by reference, aka direct mutation of $player
foreach($playersArr as &$player){
  //deal cards to all players
  $player = array_merge($player, dealCards($cardsPerUser));
}
echo "Hand: ";
print_r($playersArr);
$cardGame = [];

function compareCard($i) {
  global $playersArr;
  global $cardGame;

  $valueOfCards = [];
  $nameOfCard = [];
  // & is  used to change the state kinda.
  foreach ($playersArr as &$player){
    $keys = array_keys($player);
    $cardName=array_shift($keys);
    $cardVal=array_shift($player);
    array_push($valueOfCards, $cardVal);
    array_push($nameOfCard, $cardName);
  }
  $highestVal= max($valueOfCards);
  foreach ($valueOfCards as $index => $value) {
    if($value == $highestVal) {
     $winningPlayer = $index+1;
     $winningCardName = $nameOfCard[$index];
     $winningCardVal = $value;
    }
  }
  $winningCard = [
     "Winner" => "Player " . $winningPlayer,
     "Card Name" => $winningCardName,
     "Card Value" => $winningCardVal
   ];
   $roundNum = $i + 1;
   $cardGame["Round " . $roundNum] = $winningCard;
 }

 for ($i = 0; $i < $cardsPerUser; $i++){
   compareCard($i);
 }
 echo "<pre>";
 echo "Winning Array: ";
 print_r($cardGame);
 echo "</pre>";
?>
