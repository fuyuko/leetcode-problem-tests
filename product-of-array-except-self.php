<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/product-of-array-except-self/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     * 
     * Runtime 8ms beats 70%, Memory 31.49mb beats 46.7%
     */
    function productExceptSelf($nums) {
        $count = count($nums);
        $total_except_zero  = 1;
        $count_zero = 0;
        $zero_position = -1;
        for($i=0; $i < $count; $i++){
            if($nums[$i] !== 0){
                $total_except_zero *= $nums[$i];
            }else{
                $count_zero++;
                if($count_zero > 1) break;
                $zero_position = $i;
            }
        }
        $result = array();
        if($count_zero >= 1){
            for($i=0; $i < $count; $i++){
                if(($count_zero === 1) && ($i === $zero_position)){
                    $result[] = $total_except_zero;
                }else{
                    $result[] = 0;
                }
            }
        }
        if($count_zero === 0){
            for($i=0; $i < $count; $i++){
                $result[] = $total_except_zero/$nums[$i];
            }
        }


        return $result;
    }
}



?>

</body>
</html>