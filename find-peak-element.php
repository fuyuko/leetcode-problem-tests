<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/find-peak-element/
Lesson learned: 
-  in this problem, O(n) and O(log n) solution didn't make difference in runtime. but memory usage did.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 
     * 
     * Runtime 1ms beats 92.86% Memory 19.93mb beats 78.57%
     */
    function findPeakElement($nums) {
        $start = 0;
        $end = count($nums) - 1;
        if($end === 0) return 0;

        $i = intdiv($end, 2) + $end%2;

        while(true){
            echo "i = " . $i . "\n";
            $result = $this->isPeak($nums[$i-1], $nums[$i], $nums[$i+1]);

            if($result === 0) return $i;

            if($result === 1){
                $start = $i;
               
            } 
            if($result === -1){
              $end = $i;
            } 
            if($end === $start) return $i;
            if($end-$start === 1){
                if($nums[$start] > $nums[$end]){
                    return $start;
                }
                return $end;
            }

            $i = intdiv($end-$start, 2) + ($end-$start)%2 + $start;
            
        }

    }

    function isPeak($num1, $num2, $num3){
        if(($num1 === null) && ($num3 === null)) return 0;
        if($num1 === null){
            if($num2 > $num3) return 0;
            return 1;
        }
        if($num3 === null){
            if($num2 > $num1) return 0;
            return -1;
        }
        if(($num2 > $num1) && ($num2 > $num3)){
            return 0;
        }
        if(($num2 > $num1) && ($num3 > $num2)){
            return 1;
        }
        if(($num2 < $num1) && ($num3 < $num2)){
            return -1;
        }
        return 1;
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     * 
     * O(n) solution
     * Runtime 1ms beats 92.86% Memory 20.24mb beats 16.67%
     */
    function findPeakElement1($nums) {
        if(count($nums) === 1) return 0;

        for($i = 0; $i < count($nums); $i++){
            if($this->isPeak1($nums[$i-1], $nums[$i], $nums[$i+1]) === true){
                return $i;
            }
        }

        return 0;
    }

    function isPeak1($num1, $num2, $num3){
        if($num1 === null){
            if($num2 > $num3) return true;
            return false;
        }
        if($num3 === null){
            if($num2 > $num1) return true;
            return false;
        }
        if(($num2 > $num1) && ($num2 > $num3)){
            return true;
        }
        return false;
    }
}

?>

</body>
</html>