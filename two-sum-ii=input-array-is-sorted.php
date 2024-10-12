<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/two-sum-ii-input-array-is-sorted/
Lesson learned: 
- for-looping was much faster than using array_search() for the matching number
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     * 
     * Runtime 29ms beats 95.2%, Memory 21.50MB Beats 46.4%
     */
    function twoSum($numbers, $target) {
        $lowerEnd = 0;
        for($i = count($numbers)-1; $i > 0; $i--){
            $search = $target - $numbers[$i];
            for($j = $lowerEnd; $j < $i; $j++){
                if($search === $numbers[$j]){
                    return array($j+1, $i+1);
                }
                if($search < $numbers[$j]){
                    $lowerEnd = $j;
                    break;
                }
            }
        }

        return array();

    }
}

?>

</body>
</html>