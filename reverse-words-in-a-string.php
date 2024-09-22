<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/reverse-words-in-a-string/
Lesson learned: 
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $s
     * @return String
     * 
     * Runtime 10ms beats 43.96%, Memory 20.06mb beats 74.73%
     */
    function reverseWords($s) {
        $array = explode(" ", $s);

        $result = "";

        foreach($array as $word){
            if(strlen($word) > 0){
                $result = $word . " " . $result;
            }
        }

        return trim($result);
    }
}
?>

</body>
</html>