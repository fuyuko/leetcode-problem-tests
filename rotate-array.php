<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/rotate-array/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     * 
     * Acceptable operation: Runtime 68ms beats 29.37%, Memory 28.48MB beats 83.27%
     */
    function rotate(&$nums, $k) {
        $shift = $k;
        if($k > count($nums)){
            $shift = $k%count($nums);
        }
        $nums = array_merge(array_slice($nums, count($nums)-$shift), array_slice($nums,0, count($nums)-$shift));
        
    }

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     * 
     * logically makes sense but expensive operation - time limit exceeded in some
     */
    function rotateTimeLimitExceeded(&$nums, $k) {
        
        for($x = 0; $x < $k; $x++){
            $value = array_pop($nums);
            array_unshift($nums,$value);
        }
    }
}

?>

</body>
</html>