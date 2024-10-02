<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/climbing-stairs/
Lesson learned: 
- Fibonacci - I still don't know why this is fibonacci pattern though.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer $n
     * @return Integer
     * 
     * Runtime 3ms beats 81.89%, Memory 19.84mb beats 70.78%
     * Imporved by reducing the number of recursive function executions 
     * from  2 to 1.
     */
    function climbStairs($n) {
        if($n < 4){
            return $n;
        }
        
        $fibonacci = array(1,2,3);
        $this->buildFibonacci($n, $fibonacci);
        //var_dump($fibonacci);
        return $fibonacci[$n-1];
    }

    function buildFibonacci($n, &$array){
        for($i = 3; $i < $n; $i++){
            $array[$i] = $array[$i-2] + $array[$i-1];
        }
    }

    /**
     * @param Integer $n
     * @return Integer
     * 
     * Time Limit Exceeded - but will produce the correct solution
     * Don't know why this pattern produce the correct solution though.
     * I just noticed the pattern -> this is fibunacchi
     */
    function climbStairsTimeLimitExceeded($n) {
        if($n < 4){
            return $n;
        }
        return $this->climbStairs($n-1) + $this->climbStairs($n-2);
    }
}

?>

</body>
</html>