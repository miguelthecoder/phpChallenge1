
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
$deckWithoutInitValues = (array_keys($deck));
function createRandomDeck($deckWithoutInitValues) {
  //this shuffles the deck
  shuffle($deckWithoutInitValues);
  return $deckWithoutInitValues;
  //make a for loop that limits the number of cards FOR THE USER
  //IN THAT LOOP ARRAY_SHIFT FROM THE DECK AND ARRAY_PUSH THOSE CARDS INTO USER CONTAINER
}
$shuffledDeck = createRandomDeck($deckWithoutInitValues);
echo "<pre>";
print_r($shuffledDeck);
echo "<pre>";
$cardsPerUser = 5;
$shuffledDeckLength = count($shuffledDeckLength);
$numbOfCardsToDistribute = (($shuffledDeckLength - $cardsPerUser) -1);
echo $numbOfCardsToDistribute;
function dealCards($shuffledDeck, $cardsPerUser, $numbOfCardsToDistribute) {
    $userHand = array();
    echo 'pre: '.count($shuffledDeck);
    $usersHand = array_splice($shuffledDeck, $numbOfCardsToDistribute);
    echo ' seize of Deck: '.count($shuffledDeck);
    print_r($shuffledDeck);
      echo "<pre>";
      echo "User 1 ";
      print_r($usersHand);
      echo "<pre>";
}
$deal = dealCards($shuffledDeck, $cardsPerUser, $numbOfCardsToDistribute);

 ?>
