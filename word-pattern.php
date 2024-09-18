<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/word-pattern/
Lesson learned: 
- break vs continue: pay attention the next code to be executed
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     * 
     * Used more memory but much faster.
     * Runtime 6ms beats 42.27%, Memory 20.03MB beats 42.27%
     */
    function wordPattern($pattern, $s) {
        $t = explode(" ", $s);
        $map = [];
        if(count($t) !== strlen($pattern)){
            return false;
        }
        for($i = 0; $i < strlen($pattern); $i++){
            //echo "i = " . $i . ": " . substr($pattern, $i, 1) . " " . $t[$i] . "\n";
            
            if(in_array($t[$i], $map)){
                if(substr($pattern, $i, 1) !== array_search($t[$i], $map)){
                    return false;
                }
                if($map[substr($pattern, $i, 1)] === $t[$i]){
                    //echo "i = " . $i . ": " . substr($pattern, $i, 1) . " " . $t[$i] . "\n";
                    continue;
                }
            }else{
                if(array_key_exists(substr($pattern, $i, 1), $map)){
                    return false;
                }
                $map[substr($pattern, $i, 1)] = $t[$i];
            }
        }
        return true;
    }

    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     * 
     * Memory saver but relatively slow
     * Runtime 16ms beats 6.19%, Memory 19.76mb beats 92.78%
     */
    function wordPatternSlow($pattern, $s) {
        $t = explode(" ", $s);
        $map = [];
        if(count($t) !== strlen($pattern)){
            return false;
        }
        for($i = 0; $i < strlen($pattern); $i++){
            //echo "i = " . $i . ": " . substr($pattern, $i, 1) . " " . $t[$i] . "\n";
            
            if(in_array($t[$i], $map) && (substr($pattern, $i, 1) !== array_search($t[$i], $map))){
                return false;
            }
            if(array_key_exists(substr($pattern, $i, 1), $map)){
                if($map[substr($pattern, $i, 1)] !== $t[$i]){
                    return false;
                }
            }else{
                $map[substr($pattern, $i, 1)] = $t[$i];
            }
        }
        return true;
    }
}

?>

</body>
</html>