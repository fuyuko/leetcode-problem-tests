<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/minimum-size-subarray-sum
Lesson learned: 
- non-sliding window solution will take too much time
- definition of subarray -> sort order has to remain the same as the original array.
*/

$solution = new Solution();
$result;


class Solution {
    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     * 
     * Runtime 81ms beats 20.34%, Memory 26.21mb beats 66.10%
     *
     */
    function minSubArrayLen($target, $nums) {
        if(array_sum($nums) < $target){
            return 0;
        }
        if(max($nums) >= $target){
            return 1;
        }

        $length = count($nums);
        $sum = $nums[0];
        $start = 0;
        $end = $length-1;
        $min_result = $length;

        for($i = 1; $i <= $length; $i++){
            $sum += $nums[$i];
            if($sum >= $target){
                $end = $i;
                $min_result = $i+1;
                break;
            } 
        }

        for($i = $end+1; $i < $length; $i++){
            $sum += $nums[$i];
            $end++;

            for($j = $start; $j < $end; $j++){
                if($sum - $nums[$j] >= $target){
                    $start++;
                    $sum -= $nums[$j];
                    if($end-$start+1 < $min_result) $min_result = $end-$start+1;
                    if($end - $start === 1) return 2;
                }else{
                    break;
                }          
            }
        }

        for($j = $start; $j < $end; $j++){
            if($sum - $nums[$j] >= $target){
                $start++;
                $sum -= $nums[$j];
                if($end-$start+1 < $min_result) $min_result = $end-$start+1;
                if($end - $start === 1) return 2;
            }else{
                break;
            }
            
        }
        return $min_result;
    }

    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     *
     * Time Limit Exceeded
     */
    function minSubArrayLenTimeOut($target, $nums) {
        if(array_sum($nums) < $target){
            return 0;
        }
        if(max($nums) >= $target){
            return 1;
        }

        $window = 2;
        $length = count($nums);

        //echo "window = " . $window . " length = " . $length . "\n";

        while($window <= $length){
            if($this->foundTarget1($nums, $window, $length, $target)){
                 return $window;
            }
            $window++;            
        }
    }

    function foundTarget1(&$nums, &$window, &$length, &$target){
        for($i = 0; $i <= $length-$window; $i++){
            $a = array_slice($nums, $i, $window);
            var_dump($a);
            if(array_sum($a) >= $target){
                return true;
            }
        }
        return false;
    }


}

?>

</body>
</html>