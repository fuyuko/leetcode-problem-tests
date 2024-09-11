<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/find-the-index-of-the-first-occurrence-in-a-string/
Lesson learned: 
- A simple problem as long as you know how strpos() works 
- strpos() returns false which evaluates to "0" if intval() so you need to make sure it returns -1
*/

$solution = new Solution();
$result;


/**
 * Runtime 12ms beats 16.78%, Memory 19.78MB beats 87.58%
 */
class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        $result = strpos($haystack, $needle);
        if($result === false) return -1;
        return $result;
    }
}

?>

</body>
</html>