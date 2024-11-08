<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/evaluate-reverse-polish-notation/
Lesson learned: 
- array[] + array_pop() is much faster than array_unshift() + array_shift()
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String[] $tokens
     * @return Integer
     * Runtime 2ms beats 62.5%, Memory 21.24mb beats 61.76%
     */
    function evalRPN($tokens) {
        $stack = array();

        for($i = 0; $i < count($tokens); $i++){
            switch($tokens[$i]){
                case "+":
                case "/":
                case "*":
                case "-":
                    $n2 = array_pop($stack);
                    $n1 = array_pop($stack);
                    $stack[] = $this->operation($n1, $n2, $tokens[$i]);
                    break;
                default:
                    $stack[] = $tokens[$i];
                    break;
            }
        }



        return $stack[0];
    }

    /**
     * @param String[] $tokens
     * @return Integer
     * Runtime 257ms beats 8.33%, Memory 21.5mb beats 10.29%
     */
    function evalRPN1($tokens) {
        $stack = array();
        foreach($tokens as $index =>$token){
            switch($token){
                case "+":
                case "/":
                case "*":
                case "-":
                    $n2 = array_shift($stack);
                    $n1 = array_shift($stack);
                    array_unshift($stack, $this->operation($n1, $n2, $token));
                    break;
                default:
                    array_unshift($stack, $token);
                    break;
            }
        }

        return $stack[0];
    }

    function operation(&$n1, &$n2, &$token){
        switch($token){
            case "+":
                return $n1 + $n2;
            case "/":
                return intdiv($n1, $n2);
            case "*":
                return $n1 * $n2;
            case "-":
                return $n1 - $n2;
        }
    }
}

?>

</body>
</html>