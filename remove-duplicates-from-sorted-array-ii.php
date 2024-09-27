<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/remove-duplicates-from-sorted-array-ii/
Lesson learned: 
- count($num) value changes after reset() is executed
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 
     * Runtime 14ms beats 58.65%, Memory 19.82mb beats 75.94%
     */
    function removeDuplicates(&$nums) {
        $num = $nums[0];
        $length = count($nums);
        $count = 1;
        for($i = 1; $i < $length; $i++){
            if($nums[$i] === $num){
                if($count === 1){
                    $count++;
                }else{
                    unset($nums[$i]); 
                }  
            }else{
                $num = $nums[$i];
                $count = 1;
            }
        }
        reset($nums);
        return;
    }
}

?>

</body>
</html>