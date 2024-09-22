<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/minimum-size-subarray-sum
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {


    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     * 
     * currently not submittable - time limit exceeded
     */
    function minSubArrayLen($target, $nums) {

        $result = 0;
        $insufficient = 0;

        for($i = count($nums)-1; $i >= 0 ; $i--){
            //var_dump(array_slice($nums, $i));
            if($insufficient < $target){
                $insufficient += $nums[$i];
            }
            if($insufficient >= $target){
                $result = $this->innerLoop1($target, array_slice($nums, $i), $result);
            }
            //echo "result = " . $result . "\n";
        }

        return $result;


    }

    function innerLoop1($target, $nums, $minResult){

        if($nums[0] >= $target){
            return 1;
        }

        $result = 1;
        $sum = $nums[0];

        $count = count($nums);
        if($minResult > 0){
            $count = $minResult;
        }
        for($i = 1; $i < $count; $i++){
            $sum += $nums[$i];
            $result += 1;
            if($sum >= $target){
                break;
            }
        }

        if($minResult !== 0){
            $result = min($result, $minResult);
        }
        

        return $result;
    }

    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLenMemoryExceeded($target, $nums) {
        //var_dump($nums);
        if(array_sum($nums) < $target){
            return 0;
        }

        if($nums[0] >= $target){
            return 1;
        }

        $result = 1;
        $sum = $nums[0];
        for($i = 1; $i < count($nums); $i++){
            $sum += $nums[$i];
            $result += 1;
            if($sum >= $target){
                break;
            }
        }

        $r1 = $this->minSubArrayLen($target, array_slice($nums, 1));
        //echo "result = " . $result . " r1 = " . $r1 . "\n";
        if($r1 > 0){
            $result = min($r1, $result);
        }
        
        //echo "final result = " . $result . "\n";
        //var_dump($nums);
        return $result;
    }
}

?>

</body>
</html>