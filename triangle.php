<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/triangle/
Lesson learned: 
- Bottom to top is faster than top to bottom with much simpler algorithm
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {

        for($x = count($triangle)-1; $x > 0; $x--){
            foreach($triangle[$x-1] as $index => $element){
                    $triangle[$x-1][$index] = $element + (min($triangle[$x][$index], $triangle[$x][$index+1]));
            }
            //var_dump($triangle[$x-1]);
        }

        return $triangle[0][0];

    }
}

/**
 * Algorithm is correct but will generate "time limit exceeded in a large triangle -> not submittable
 */
class SolutionTopToBottom {

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        $result = $triangle[0][0];

        if(count($triangle) > 1){
            $right = $this->minTotal(array_slice($triangle, 1), 1);
            $left = $this->minTotal(array_slice($triangle, 1), 0);

            $result += min($right, $left);
        }

        return $result;
    }

    function minTotal($triangle, $index){
        $result = $triangle[0][$index];
        
        if(count($triangle) > 1){
            $right = $this->minTotal(array_slice($triangle, 1), $index+1);
            $left = $this->minTotal(array_slice($triangle, 1), $index);

            $result += min($right, $left);
        }

        return $result;
    }
}

?>

</body>
</html>