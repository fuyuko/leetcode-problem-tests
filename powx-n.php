<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/powx-n/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     * 
     * Runtime 0ms beats 100%, Memory 10.9mb beats 78,87%
     */
    function myPow($x, $n) {
        if($n === 0) return 1;
        if($n === 1) return $x;
        if($n === -1) return 1/$x;

        $n1 = intdiv(abs($n), 2);
        $r1 = $this->absPow($x, $n1);

        $result = $r1 * $r1;
        if(abs($n)%2 !== 0){
            $result *= $x;
        }

        if($n < 0){
            return 1/$result;
        }

        return $result;
    }

    function absPow($x, $n){
        if($n === 0) return 1;
        if($n === 1) return $x;
        if($n === 2) return $x*$x;

        $n1 = intdiv($n, 2);

        $r1 = $this->absPow($x, $n1);

        $result = $r1 * $r1;

        if(abs($n)%2 !== 0){
            $result *= $x;
        }

        return $result;
    }
}

?>

</body>
</html>