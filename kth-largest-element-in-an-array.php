<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/kth-largest-element-in-an-array/
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
     * @return Integer
     * 
     * Runtime 48ms beats 98.15%, Memory 26.66mb beats 85.19%
     */
    function findKthLargest($nums, $k) {
        if(count($nums) === 1) return $nums[0];
        $min = $nums[0];
        $max = $nums[0];
        $heap[$nums[0]] = 1;

        for($i=1; $i < count($nums); $i++){
            if($nums[$i] > $max) $max = $nums[$i];
            if($nums[$i] < $min) $min = $nums[$i];
            if($heap[$nums[$i]] === null) $heap[$nums[$i]] = 1;
            else $heap[$nums[$i]] += 1;
        } 

        $count = 0;
        for($i=$max; $i >= $min; $i--){
            if($heap[$i] !== null){
                $count += $heap[$i];
                if($count >= $k) return $i;
            }
        }
    }
}

?>

</body>
</html>