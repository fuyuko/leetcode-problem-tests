<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/is-subsequence/
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
     * Runtime 8ms beats 44.95%, Memory 19.88mb beats 81.88%
     */
    function isSubsequence($s, $t) {
        $j = -1;

        for($i = 0; $i < strlen($s); $i++){
            //echo "haystack = " . substr($t, $j+1) . "\n";
            //echo "char = " . substr($s, $i, 1) . "\n";
            $found = strpos(substr($t, $j+1), substr($s, $i, 1));
            //var_dump($found);
            if(($found !== false) && ($found >= 0)){
                $j += $found+1;
            }else{
                return false;
            }
        }

        return true;
    }
}

?>

</body>
</html>