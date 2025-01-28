<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/maximum-average-subarray-i
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
     * @return Float
     * 
     * Runtime 14ms beats 97.98%, Memroy 27.42.mb beats 70.71%
     */
    function findMaxAverage($nums, $k) {
        $count = count($nums);
        $high = 0;
        for($i = 0; $i < $k; $i++){
            $high += $nums[$i];
        }

        $current = $high;

        for($i = $k; $i < $count; $i++){
            $current = $current - $nums[$i-$k] + $nums[$i];
            if($current > $high) $high = $current;
        }

        return $high/$k;
    }
}

?>

</body>
</html>