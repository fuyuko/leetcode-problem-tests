<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/valid-parentheses/?envType=study-plan-v2&envId=top-interview-150
Lesson learned: 
- Not very efficient solution. I need to revisit
- simple element & pop is significantly faster than shift & unshift (the %2 addition didn't make that much difference)
*/

$solution = new Solution();
$s = "([])";
$result = $solution->isValid($s);
if($result){
    echo "is valid.";
}else{
    echo "is not valid";
}
class Solution {

    /**
     * @param String $s
     * @return Boolean
     *
     * Runtime 0m beats 100%, Memory 20.48MB beats 16.23%
     */
    function isValid($s) {
        $stack = [];

        if(strlen($s)%2 != 0){
            return false;
        }

        foreach(str_split($s) as $c){
            switch($c){
                case "(":
                case "[":
                case "{":
                    $stack[] = $c;
                    break;
                case ")":
                    if(end($stack) != "("){
                        return false;
                    }
                    array_pop($stack);  
                    break;
                case "]":
                    if(end($stack) != "["){
                        return false;
                    }
                    array_pop($stack);  
                    break;
                case "}":
                    if(end($stack) != "{"){
                        return false;
                    }
                    array_pop($stack); 
                    break;
            }       
        }

        if($stack){
                return false;
        }
        return true;
    }
}

    /**
     * @param String $s
     * @return Boolean
     *
     * Worse runtime, better memory usage
     * Rumtime 46ms beats 5.27%, Memory 20.40mb beats 27.42%
     */
    function isValidStillInefficient($s) {
        $stack = [];

        for($x = 0; $x < strlen($s); $x++){
            switch(substr($s, $x, 1)){
                case "(":
                case "[":
                case "{":
                    array_unshift($stack, substr($s, $x, 1));
                    break;
                case ")":
                    if($stack[0] != "("){
                        return false;
                    }
                    array_shift($stack); 
                    break;
                case "]":
                    if($stack[0] != "["){
                        return false;
                    }
                    array_shift($stack);  
                    break;
                case "}":
                    if($stack[0] != "{"){
                        return false;
                    }
                    array_shift($stack); 
                    break;
            }       
        }

        if($stack){
                return false;
        }
        return true;
    }

    /**
     * @param String $s
     * @return Boolean
     *
     * Rumtime 34ms beats 7.21%, Memory 20.68mb beats 8.61%
     */
    function isValidInefficient($s) {
        $stack = [];

        foreach(str_split($s) as $c){
            switch($c){
                case "(":
                case "[":
                case "{":
                    array_unshift($stack, $c);
                    break;
                case ")":
                    if($stack[0] != "("){
                        return false;
                    }
                    array_shift($stack); 
                    break;
                case "]":
                    if($stack[0] != "["){
                        return false;
                    }
                    array_shift($stack);  
                    break;
                case "}":
                    if($stack[0] != "{"){
                        return false;
                    }
                    array_shift($stack); 
                    break;
            }       
        }

        if($stack){
                return false;
        }
        return true;
    }

    /**
     * @param String $s
     * @return Boolean
     * 
     * This solution ignores the nesting order of the prentheses
     */
    function isValidIngoreNest($s) {
        $track = array("(" => 0, "{" => 0, "[" => 0);

        foreach(str_split($s) as $c){
            //echo "c = " . $c;
            switch($c){
                case "(":
                case "[":
                case "{":
                    $track[$c]++;
                    break;
                case ")":
                    $track["("]--;
                    break;
                case "]":
                    $track["["]--;
                    break;
                case "}":
                    $track["{"]--;
                    break;
                default:
                    break;
            }
            //var_dump($track);
        }

        foreach($track as $element){
            if($element != 0){
                return false;
            }
        }
        return true;
    }
}

?>

</body>
</html>