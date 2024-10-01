<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/valid-anagram/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     * 
     * Logical but slow
     * Runtime 62ms beats 29.02%, Memory 27.53MB beats 8.52%
     */
    function isAnagram($s, $t) {
        if(strlen($s) !== strlen($t)){
            return false;
        }
        $ss = str_split($s);
        $tt = str_split($t);
        sort($ss);
        sort($tt);
        if(implode($ss) !== implode($tt)){
            return false;
        }
        
        return true;
    }
}

?>

</body>
</html>