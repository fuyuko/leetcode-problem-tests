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
     */
    function minSubArrayLen($target, $nums) {
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
            if($this->foundTarget($nums, $window, $length, $target)){
                 return $window;
            }
            $window++;            
        }
    }

    function foundTarget(&$nums, &$window, &$length, &$target){
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