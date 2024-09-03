<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/length-of-last-word/
Lesson learned: 
- this was simply about knowing the built-in functions.
- no local test was needed
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $s
     * @return Integer
     * 
     * Runtime 0ms beats 100%, memory 19.88MB beats 87.03%
     */
    function lengthOfLastWord($s) {
        $array = explode(" ", trim($s));
        return strlen($array[count($array)-1]);
    }
}

?>

</body>
</html>