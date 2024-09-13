<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/isomorphic-strings/
Lesson learned: 
- importance of `if($key === false)` to differenciate from when $key === 0
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
     * Runtime 21ms beats 11.71%, Memory 19.56mb beats 100%
     */
    function isIsomorphic($s, $t) {
        $map[$s[0]] = $t[0];

        if(strlen($s) > 1){
            for($x = 1; $x < strlen($s); $x++){
                $key = array_search($t[$x], $map);
                //echo "key = " . $key . " s = " . $s[$x] . " t = " .  $t[$x] . "\n";
                if($key === false){
                    if($map[$s[$x]] === null){
                        $map[$s[$x]] = $t[$x];
                    }else{
                        return false;
                    }
                    
                }else{
                    if($key != $s[$x]){
                        return false;
                    }
                }
            }
        }     
        return true;
    }
}

?>

</body>
</html>