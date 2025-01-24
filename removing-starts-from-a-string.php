<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/removing-stars-from-a-string/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $s
     * @return String
     * 
     * Runtime 147ms beats 45.28%, Memory 27.39mb beats 11.32%
     */
    function removeStars1($s) {
        $result = array();
        $last = -1;
        foreach(str_split($s) as $c){
            switch($c){
                case "*":
                    unset($result[$last]);
                    $last--;
                    break;
                default:
                    $last++;
                    $result[$last] = $c;

                    break;
            }
        }
        
        return implode("", $result);
    }

    /**
     * @param String $s
     * @return String
     * 
     * Only 2ms faster than the above the code is much simpler
     */
    function removeStarsCoPilot($s) {
        $stack = [];
        foreach (str_split($s) as $c) {
            if ($c === '*') {
                array_pop($stack);
            } else {
                $stack[] = $c;
            }
        }
        return implode('', $stack);
    }
}

?>

</body>
</html>