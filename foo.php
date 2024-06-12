<?php

// Question 1
// Cette fonction fusionne chaque intervalles en cas de chevauchement.
// Elle retourne un array des intervalles non chevauchant

// Question 2
function foo($intervals) {

    if (empty($intervals)) {
        return [];
    }

    // trie
    $values = array_column($intervals, null);
    array_multisort($values, SORT_ASC, $intervals);

    $res = [];
    $i = 0;

    //compare $res[$i][1] avec l'intervalle actuel
    foreach ($intervals as $interval) {
        if (count($res) == 0) {
            $res[] = $interval;
        }
        if ($res[$i][1] > $interval[1]) {
            continue;
        } elseif ($res[$i][1] >= $interval[0]) {
            // si les intervalles se chevauchent ou se touchent
            $res[$i][1] = $interval[1];
        } else {
            $res[] = $interval;
            $i++;
        }
    }

    return $res;
    
}

echo '<pre> Assert 1 :  ' , var_dump(foo([[0, 3], [6, 10]])), '</pre>';// [[0, 3], [6, 10]]
echo '<pre> Assert 2 : ' , var_dump(foo([[0, 5], [3, 10]])), '</pre>'; // [[0, 10]]
echo '<pre> Assert 3 : ' , var_dump(foo([[0, 5], [2, 4]])), '</pre>'; // [[0, 5]]
echo '<pre> Assert 4 : ' , var_dump(foo([[7, 8], [3, 6], [2, 4]])), '</pre>'; // [[2, 6], [7, 8]]
echo '<pre> Assert 5 : ' , var_dump(foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]])), '</pre>'; // [[1, 10], [15, 20]]


// Question 3
// Environ 2H30