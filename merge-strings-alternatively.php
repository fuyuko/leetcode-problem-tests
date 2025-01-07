<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/merge-strings-alternately/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return String
     * 
     * runtime: 0md beats 100%, memory: 20.33mb beats 56.85%
     */
    function mergeAlternately($word1, $word2) {
        $result = "";
        $count = max(strlen($word1), strlen($word2));

        for($i = 0; $i < $count; $i++){
            if($i < strlen($word1)){
                $result .= $word1[$i];
            }
            if($i < strlen($word2)){
                $result .= $word2[$i];
            }
        }

        return $result;
    }
}

?>

</body>
</html>