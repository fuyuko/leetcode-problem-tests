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

/*

Test cases:
    
[1,2,3,1]
[2,7,9,3,1]
[1,3,1]
[2,3,2]
[1,7,9,4]
[8,9,9,4,10,5,6,9,7,9]
[104,209,137,52,158,67,213,86,141,110,151,127,238,147,169,138,240,185,246,225,147,203,83,83,131,227,54,78,165,180,214,151,111,161,233,147,124,143]
[226,174,214,16,218,48,153,131,128,17,157,142,88,43,37,157,43,221,191,68,206,23,225,82,54,118,111,46,80,49,245,63,25,194,72,80,143,55,209,18,55,122,65,66,177,101,63,201,172,130,103,225,142,46,86,185,62,138,212,192,125,77,223,188,99,228,90,25,193,211,84,239,119,234,85,83,123,120,131,203,219,10,82,35,120,180,249,106,37,169,225,54,103,55,166,124]

*/


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 
     * Rumtime 1ms beats 20%, Memroy 20.09mb beats 36.21%
     */
    function rob($nums) {
        $sums = array($nums[0], $nums[1], $nums[0]+$nums[2]);

        $count = count($nums);
        $result1 = $this->previousBestMove($count-1, $sums, $nums);
        $result2 = $this->previousBestMove($count-2, $sums, $nums);
        //var_dump($sums);
        return max($result1, $result2);
    }

    function previousBestMove($i, &$sums, &$nums){
        if($i > 2){
            if($sums[$i-2] === null){
                $sums[$i-2] = $this->previousBestMove($i-2, $sums, $nums);
            }
            if($sums[$i-3] === null){
                $sums[$i-3] = $this->previousBestMove($i-3, $sums, $nums);
            }
            if($sums[$i-3] >  $sums[$i-2]){
                $sums[$i] = $sums[$i-3] + $nums[$i];
                
            }else{
                $sums[$i] = $sums[$i-2] + $nums[$i];
            }
        } 
        return $sums[$i];
    }

}

?>

</body>
</html>