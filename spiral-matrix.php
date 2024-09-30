<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/spiral-matrix/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     * 
     * Runtime 10 ms beats 25.97%, Memory 19.62MB beats 90.91%
     */
    function spiralOrder($matrix) {
        $result = []; 

        $columnR = count($matrix[0]);
        $rowR = count($matrix);
        $rowF = 0; 
        $columnF = 0;

        if(($rowF < $rowR) && ($columnF < $columnR)){
            $result = array_merge($result, $this->innerFunction($matrix, $rowF, $rowR, $columnF, $columnR));
        }
        
        return $result;
    }

    function innerFunction(&$matrix, &$rF, &$rR, &$cF, &$cR){
        $result = [];
        for($i = $cF; $i < $cR; $i++){
            $result[] = $matrix[$rF][$i];
        }
        $rF++;

        if($rF < $rR){
           //column at the end
            for($i = $rF; $i < $rR; $i++){
                $result[] = $matrix[$i][$cR-1];
            } 
            $cR--;
        }else{
            return $result;
        }

        if($cF < $cR){
            //last row 
            for($i = $cR - 1; $i >= $cF; $i--){
                $result[] = $matrix[$rR-1][$i];
            }
            $rR--;
        }else{
            return $result;
        }

        if($rF < $rR){
            //first column
            for($i = $rR-1; $i >= $rF; $i--){
                $result[] = $matrix[$i][$cF];
            }
            $cF++;
        }else{
            return $result;
        }

        if(($rF < $rR) && ($cF < $cR)){
            $result = array_merge($result, $this->innerFunction($matrix, $rF, $rR, $cF, $cR));
        }

        return $result;
    }
}

?>

</body>
</html>