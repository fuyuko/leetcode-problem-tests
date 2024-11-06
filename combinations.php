<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/combinations/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     * 
     * Runtime 244ms beats 50%, memory 154.47mb beats 5.88%
     */
    function combine($n, $k) {
        $results = $this->innerComb($n, $k);
        $out = null;
        foreach($results as $row){
            if($out === null) $out = $row;
            else $out = array_merge($out, $row);
        }
        return $out;

    }

    function innerComb($n, $k){
        $array = array();

        if($k === 1){
            for($i=1; $i <= $n; $i++){
                $array[$i][] = array($i);
            }
            return $array;
        }

        $previous = $this->innerComb($n-1, $k-1);

        for($i = $n; $i > 0; $i--){
            for($j = $i-1; $j >= 0; $j--){
                foreach($previous[$j] as $comb){
                    array_push($comb, $i);
                    $array[$i][] = $comb;
                }
            }
        }


       return $array;

    }


}

?>

</body>
</html>