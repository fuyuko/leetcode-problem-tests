<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/palindrome-number/
Lesson learned: 
- n/a: pretty straight forward
*/

$solution = new Solution();
$result;

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     * 
     * Runtime 14ms beats 97.18%, Memory 19.91MB beats 45.81mb
     */
    function isPalindrome($x) {
        $num = strval($x);
        $count = floor(strlen($num)/2);
        $odd = strlen($num)%2;

        for($x = 0; $x < $count; $x++){
            if(substr($num, $count-$x-1,1)!==substr($num,$count+$odd+$x, 1)){
                return false;
            }
        }
        return true;

    }
}

?>

</body>
</html>