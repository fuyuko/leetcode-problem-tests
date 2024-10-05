<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/sqrtx/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer $x
     * @return Integer
     * 
     * Runtime 239ms beats 26.09%, Memory 19.77mb beats 86.47%
     * must be a better way
     */
    function mySqrt($x) {
        if($x===0) return 0;
        if($x<4) return 1;

        $quotient = 1;

        while(($x / $quotient) >= $quotient){
            $quotient++;
        }

        return $quotient-1;

    }
}

?>

</body>
</html>