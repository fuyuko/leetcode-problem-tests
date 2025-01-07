<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/move-zeroes/
Lesson learned: 
-  CoPilot's solution is faster and simplar code but the difference is 1ms and uses more memory.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     * 
     * runtime: 2ms beats 68.39%, memory: 21.99mb beats 52.33%
     */
    function moveZeroesCoPilot(&$nums) {
        $count = count($nums);
        if ($count < 2) return;
    
        $nonZeroIndex = 0;
    
        // Move all non-zero elements to the front
        for ($i = 0; $i < $count; $i++) {
            if ($nums[$i] !== 0) {
                $nums[$nonZeroIndex++] = $nums[$i];
            }
        }
    
        // Fill the remaining positions with zeroes
        for ($i = $nonZeroIndex; $i < $count; $i++) {
            $nums[$i] = 0;
        }
    }

    /**
     * @param Integer[] $nums
     * @return NULL
     * 
     * runtime: 3ms beats 33.68%, memory: 21.81mb beats 63.21%
     */
    function moveZeroes(&$nums) {
        $count = count($nums);
        if($count < 2) return;
        
        $numIndex = 0;

        for($i = 0; $i < $count; $i++){
            if($nums[$i] === 0){
                if($numIndex < $i) $numIndex = $i;
                $found = false;
                for($j = $numIndex+1; $j < $count; $j++){
                    if($nums[$j] !== 0){
                        $numIndex = $j;
                        $nums[$i] = $nums[$j];
                        $nums[$j] = 0;
                        $found = true;
                        break;
                    }
                }
                if(!$found) return;
            }
        }
    }

    /**
     * @param Integer[] $nums
     * @return NULL
     * 
     * runtime: 746ms beats 6.22%, memory: 22.17mb beats 28.50%
     */
    function moveZeroes1(&$nums) {
        if(count($nums) < 2) return;
        $r = null;
        for($i = 0; $i < count($nums); $i++){
            if($nums[$i] === 0){
                $r = $this->swapZero($nums, $i);
            }
            if($r === -1) return;
        }
    }

    function swapZero(&$nums, $current){
        for($i = $current+1; $i < count($nums); $i++){
            if($nums[$i] !== 0){
                $nums[$current] = $nums[$i];
                $nums[$i] = 0;          
                return $i;
            }
        }
        return -1;
    }
}

?>

</body>
</html>