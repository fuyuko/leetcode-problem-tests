<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: 
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;

//logically make sense but time limit exceeded
class Solution1 {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        //constraint = 1 <= nums.length <= 100
        $size = count($nums);
        if($size === 1){
            return $nums[0];
        }

        $result = $this->findMaxMoney($nums, $size, 0);
        $alternative = $this->findMaxMoney($nums, $size, 1);

        return max($result, $alternative);
    }

    function findMaxMoney(&$nums, &$size, $current){

        if(($current+2) >= $size){
            return $nums[$current];
        }

         $x = $nums[$current] + $this->findMaxMoney($nums, $size, $current+2);
         
         if(($current+3) >= $size){
            return $x;
        }
         $y = $this->findMaxMoney($nums, $size, $current+3);
         $y += max($nums[$current], $nums[$current+1]);

        return max($x, $y);
    }
}

?>

</body>
</html>