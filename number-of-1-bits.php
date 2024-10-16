<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/number-of-1-bits/
Lesson learned: 
- knowing PHP built-in functions is important - substr_count()
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer $n
     * @return Integer
     *
     * runtime 4ms beats 77.03% Memory 20.04mb beats 14.86%
     */
    function hammingWeight($n) {
        $str = decbin($n);
        return  substr_count($str, '1');
    }

    /**
     * @param Integer $n
     * @return Integer
     *
     * runtime 11ms beats 35.13% Memory 20.06mb beats 14.86%
     */
    function hammingWeight1($n) {
        $str = decbin($n);
        $str = str_replace("0", "", $str);
        return strlen($str);
    }
}

?>

</body>
</html>