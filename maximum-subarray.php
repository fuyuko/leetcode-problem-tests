<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/maximum-subarray/
Lesson learned: 
- brutal force = time limit exceeded
- kanade's algorithm: O(n), the mex value of the subarray ending at the current position is either the value of the current position or the value of the subarray ending at the previous position plus the value of the current position.
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $length = count($nums);
        $max = $nums[0];
        if($length < 2) return $max;
        
        $temp_max = $max;
        for($j = 1; $j < $length; $j++){
            $temp_max = max($nums[$j], $nums[$j]+$temp_max);
            if($temp_max > $max) $max = $temp_max;
        }
        return $max;
    }
    /**
     * @param Integer[] $nums
     * @return Integer
     *
     * TIme Limit Exceeded - Brute Force
     */
    function maxSubArray1($nums) {
        $length = count($nums);
        $max = $nums[0];

        if($length < 2) return $max;

        for($j = 1; $j < $length; $j++){
            if($nums[$j] > $max) $max = $sum;
            
            $sum += $nums[$j]; 
            if($sum > $max) $max = $sum;

            $sum_k = $sum;
            for($k = 0; $k < $j; $k++){
                $sum_k = $sum_k - $nums[$k];
                if($sum_k > $max) $max = $sum_k;
            }
        }

        return $max;
    }
}

?>

</body>
</html>