<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/merge-intervals/
Lesson learned: 
- usort() using a class member function
- use of spaceship operator "<=>" and shorthand for if-then "?:"
*/

$solution = new Solution();
$result;


class Solution {

    function cmp($a, $b) {
        return $a[0] <=> $b[0] ?: $a[1] <=> $b[1];
    }

    /**
     * @param Integer[] $a, $b
     * @return Integer
     * 
     * comparison operator for an Integer array size of 2
     */
    function cmpInefficient($a, $b){
        if($a[0] === $b[0]){
            if($a[1] === $b[1]){
                return 0;
            }
            return ($a[1] < $b[1]) ? -1 : 1;
            
        }
        return ($a[0] < $b[0]) ? -1 : 1;
    }

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     * 
     * Runtime 59ms beats 47%, Memory 29.70mb beats 20%
     */
    function merge($intervals) {

        if(count($intervals) < 2){
            return $intervals;
        }

        usort($intervals, [Solution::class, "cmp"]);
        $result = [];
        $start = $intervals[0][0];
        $end = $intervals[0][1];
        for($i = 1; $i < count($intervals); $i++){
            if($end >= $intervals[$i][0]){
                $end = max($end, $intervals[$i][1]);                    
            }else{
                $result[] = array($start, $end);
                $start = $intervals[$i][0];
                $end = $intervals[$i][1];
            }
        }
        $result[] = array($start, $end);
    
        return $result;
    }

}

?>

</body>
</html>