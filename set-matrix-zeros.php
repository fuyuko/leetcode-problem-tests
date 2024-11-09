<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/set-matrix-zeroes/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     * 
     * Runtime 1ms beats 100%, Memory 22.18mb beats 30.95%
     */
    function setZeroes(&$matrix) {
        $numC = count($matrix[0]);
        $numR = count($matrix);
        $zerosC = array();
        $nonzerosR = array();
        foreach($matrix as $r => $row){
            $zeroPresent = false;
            foreach($row as $c => $cell){
                if($cell === 0){
                    $zerosC[] = $c;
                    $zeroPresent = true;
                }
            }
            if($zeroPresent){
                for($i=0; $i<$numC; $i++){
                    $matrix[$r][$i] = 0;
                }
            }else{
                $nonzerosR[] = $r;
            }
        }

        foreach($zerosC as $c){
            foreach($nonzerosR as $r){
                $matrix[$r][$c] = 0;
            }
        }
    }
}

?>

</body>
</html>