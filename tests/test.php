<?php
//exercise 1
function enumerateOddNumbers($numberStart, $numberEnd) {
    $odds = [];

    for ($i = $numberStart; $i <= $numberEnd; $i++) {
        if ($i % 2 != 0) {
            $odds[] = $i;
        }
    }

    return $odds;
}

$oddNumbers =  enumerateOddNumbers(100, 744);
//print_r($oddNumbers);


//Exercise 2
function elementExists($array, $element) {
    return in_array($element, $array);
}

$array = [1,2,3,4];
$number = 8;
/*
if (elementExists($array, $number)) {
    echo "$number exists in the array.";
} else {
    echo "$number does not exist in the array.";
}
*/
//ex 3
function concatenateLists($list1, $list2) {
    return array_merge($list1, $list2);
}

$list1 = ["a", "b", "c"];
$list2 = [1, 2, 3];

$combinedList = concatenateLists($list1, $list2);
//print_r($combinedList);

//ex 4

function shuffleDeck($n) {

    $suits = ["Hearts", "Diamonds", "Clubs", "Spades"];
    $ranks = ["Ace", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King"];
    $deck = [];

    foreach ($suits as $suit) {
        foreach ($ranks as $rank) {
            $deck[] = "$rank of $suit";
        }
    }

    shuffle($deck);

    return array_slice($deck, 0, $n);
}

print_r(shuffleDeck(3));

//ex5




