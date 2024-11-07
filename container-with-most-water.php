<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/container-with-most-water/
Lesson learned: 
- needed a hint: Try to use two-pointers. Set one pointer to the left and one to the right of the array. Always move the pointer that points to the lower line.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     *
     * Runtime 20ms beats 81.97%, Memory 26.7mb beats 61.68
     */
    function maxArea($height) {
        $length = count($height);

        if($length === 2){
            return min($height[0], $height[1]);
        } 

        $ptr1 = 0;
        $ptr2 = $length-1;
        $result = min($height[$ptr1], $height[$ptr2]) * ($ptr2-$ptr1);
 
        while($ptr1 < $ptr2){
            if($height[$ptr1] <= $height[$ptr2]){
                $ptr1++;
            }else{
                $ptr2--;
            }
            $current = min($height[$ptr1], $height[$ptr2]) * ($ptr2-$ptr1);
            if($current > $result) $result = $current;
        }

        return $result;
        
    }

    /**
     * @param Integer[] $height
     * @return Integer
     *
     * Inefficient = O(n^2)
     */
    function maxArea1($height) {
        $length = count($height);

        if($length === 2){
            return min($height[0], $height[1]);
        }   

        $max_water =0;
       
        foreach($height as $index => $start){
            for($i = $index+1; $i < $length; $i++){
                $water = 0;
                if($start <= $height[$i]){
                    $water =  $start * ($i - $index);
                }else{
                    $water = $height[$i] * ($i - $index);
                }
                if($max_water < $water) $max_water = $water;
            }
        }

        return $max_water;
    }
}

?>

</body>
</html>