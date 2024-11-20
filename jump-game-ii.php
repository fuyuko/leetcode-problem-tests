<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/jump-game-ii/
Lesson learned: 
- not the best solution but it works
- greedy algorithm by copilot is a better solution. 

The greedy algorithm is a problem-solving approach that makes a series of choices, 
each of which looks the best at the moment, with the hope of finding a global 
optimum solution. The key idea is to make the locally optimal choice at each step 
with the intent of finding a global optimum.

Characteristics of Greedy Algorithms:
- Greedy Choice Property: A global optimum can be arrived at by selecting the local 
optimums.
- Optimal Substructure: A problem has an optimal substructure if an optimal solution 
to the problem contains optimal solutions to the sub-problems.
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * Runtime 184ms beats 18.52%, Memory 20.9mb beats 60%
     */
    function jump($nums) {
        $goal = count($nums)-1;
        if($goal < 2) return $goal;

        $min = $goal;

        for($i = $goal-1; $i >= 0; $i--){
            $reach = $goal - $i;
            if($nums[$i] === 0){
                $nums[$i] = $goal+1;
            }elseif($reach <= $nums[$i]){ //reach goal in one step;
                $nums[$i] = 1;
            }else{
                //$a = array_slice($nums, $i+1, $nums[$i]);
                $nums[$i] = min(array_slice($nums, $i+1, $nums[$i])) + 1;
            }
            if($nums[$i] < $min) $min = $nums[$i];
        }

        return $nums[0];

    }

    /**
     * @param Integer[] $nums
     * @return Integer
     * Runtime 2ms beats 96.43%, Memory 20.83mb beats 57.63%
     */
    function jumpByCopilot($nums) {
        $jumps = 0;
        $currentEnd = 0;
        $farthest = 0;

        for ($i = 0; $i < count($nums) - 1; $i++) {
            $farthest = max($farthest, $i + $nums[$i]);
            if ($i == $currentEnd) {
                $jumps++;
                $currentEnd = $farthest;
            }
        }

        return $jumps;
    }
}

?>

</body>
</html>