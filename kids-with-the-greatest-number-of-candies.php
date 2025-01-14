<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/kids-with-the-greatest-number-of-candies/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     * 
     * Runtime: 0ms beats 100%, Memory: 20.63mb beats 25.49%
     */
    function kidsWithCandies($candies, $extraCandies) {
        $result = array();
        $max = max($candies);
        foreach($candies as $i => $candy){
            $result[$i] = (($candy + $extraCandies) >= $max);
        }

        return $result;
    }
}

?>

</body>
</html>