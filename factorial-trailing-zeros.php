<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/factorial-trailing-zeroes/
Lesson learned: 
- O(logN) solution but still slow compared to other solution -> need to revisit.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer $n
     * @return Integer
     * 
     * Runtime 200ms beats 7.14%, memory 23.05mb beats 7.14%
     */
    function trailingZeroes($n) {

        if($n < 5){
            return 0;
        }

        $two = 3;
        $five = 1;

        if($n > 5){
            $this->countTwoAndFive($n, $two, $five);
        }
        
        return min($two, $five);
    }

    function countTwoAndFive($n, &$two, &$five){
        $current = $n;
        while($current%5 === 0){
            $five++;
            $current = intdiv($current, 5);
        }
        while($current%2 === 0){
            $two++;
            $current = intdiv($current, 2);
        }

        if($n-1 > 5){
            $this->countTwoAndFive($n-1, $two, $five);
        }
        return;
    }
}

?>

</body>
</html>