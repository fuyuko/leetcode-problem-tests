<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/h-index/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;

// Runtime 16ms beats 33.33%, Memory 20.17mb bests 78.49%
class Solution {

    /**
     * @param Integer[] $citations
     * @return Integer
     */
    function hIndex($citations) {
        $publications = count($citations);
        $max_citation  = max($citations);


        for($i = min($max_citation, $publications); $i > 0; $i--){
            if($this->countHigher($citations, $i) >= $i){
                    return $i;
            }
            if($i === 1){
                return $this->countHigher($citations, $i);
            }  
        }
        
        return 0;
    }

    function countHigher($array, $num){
        $count = 0;
        for($i=0; $i < count($array); $i++){
            if($array[$i] >= $num){
                $count++;
            }
        }
        return $count;
    }

}

?>

</body>
</html>