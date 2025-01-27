<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/find-the-highest-altitude/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $gain
     * @return Integer
     * 
     * Runtime 0ms beats 100%, Memory 20.71mb beats 5%
     */
    function largestAltitude($gain) {
        $current = 0;
        $high = 0;
        foreach($gain as $g){
            $current += $g;
            if($current > $high) $high = $current;
        }

        return $high;
    }
}

?>

</body>
</html>