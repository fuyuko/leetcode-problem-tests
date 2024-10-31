<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/rotate-image/
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
     * Runtime 0ms beats 100%, Memory 19.97mb beats 55.56&
     */
    function rotate(&$matrix) {
        $end = count($matrix) - 1;
        $start = 0;

        while($end > $start){
            for($i=$start; $i < $end; $i++){
                $temp = $matrix[$start][$i];
                $matrix[$start][$i] = $matrix[$end-($i-$start)][$start];
                $matrix[$end-($i-$start)][$start] = $matrix[$end][$end-($i-$start)];
                $matrix[$end][$end-($i-$start)] = $matrix[$i][$end];
                $matrix[$i][$end] = $temp;
            }
            $end = $end -1;
            $start = $start+1;
        }

        return $matrix;
    }
}

?>

</body>
</html>