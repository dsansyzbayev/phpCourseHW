<?php

class CardwithSuit
{
    public $suits = ['C','D','H','S'];
    public $cards = ['6','7','8','9','10','J','Q','K','A'];
    public $strongCardSuit;
    public $strongCardValue = 0;

    function buildDeck()
    {
        $cardDeck = [];
        for($i = 0; $i < count($this->suits); $i++ ){
            for($j = 0; $j < count($this->cards); $j++)
            {
                $cardDeck [] = [
                        'suit' => $this->suits[$i],
                        'card' => $this->cards[$j],
                        'strength' => $j + 6
                ];
            }
        }

        return $cardDeck;
    }

    function setStrongCard($cardPow)
    {
        $this->strongCardSuit = $cardPow;
    }

    function getStrongCard()
    {
        return $this->strongCardSuit;
    }

    function changeStrength($deck, $cardPow)
    {
        $sixCards = $this->buildDeck();
        foreach( $sixCards as $value)
        {
            if($cardPow == "H" && in_array($cardPow, $value))
            {
                $value['strength'] += 4;
            }
            else
            {
                $value['strength'] += 0;
            }

            if($cardPow == "C" && in_array($cardPow, $value))
            {
                $value['strength'] += 4;
            }
            else
            {
                $value['strength'] += 0;
            }

            if($cardPow == "D" && in_array($cardPow, $value))
            {
                $value['strength'] += 4;
            }
            else
            {
                $value['strength'] += 0;
            }

            if($cardPow == "S" && in_array($cardPow, $value))
            {
                $value['strength'] += 4;
            }
            else
            {
                $value['strength'] += 0;
            }
        }
    }

}

class Players
{
    public $deckOfPlayer = [];

    function setDeck($deck)
    {
        $this->deckOfPlayer = $deck;
    }

    function getDeck()
    {
        return $this->deckOfPlayer;
    }
}

$cards = new CardWithSuit();

$newDeck = $cards->buildDeck();

$player1 = new Players();

$deck = [];
$cardPow = "";

shuffle($newDeck);

$cards->changeStrength($newDeck, $cardPow);

for($i = 0; $i < 6; $i++){
    $deck [] = $newDeck[$i];
    $cardPow = $newDeck[7]['suit'];
}

$cards->setStrongCard($cardPow);



$r = $player1->setDeck($deck);

print_r($player1->getDeck());

echo $cardPow;
?>