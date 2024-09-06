<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/longest-common-prefix/
- 
-
*/

$solution = new Solution();
$result;

class Solution {

    /**
     * @param String[] $strs
     * @return String
     * 
     * Runtime 10ms, beats 42.28%, memory 19.74mb beats 95.37%
     */
    function longestCommonPrefix($strs) {
        $result = $strs[0];
        if(count($strs) > 1){
            for($x=1; $x < count($strs); $x++){
                $found = false;
                $length = min(strlen($result), strlen($strs[$x]));
                //var_dump(strlen($strs[$x]));
                for($y = $length; $y > 0; $y--){
                    //var_dump($result);
                    if(strncmp($result, $strs[$x], $y) == 0){
                        $result = substr($result, 0, $y); 
                        $found = true;
                        break;
                    }
                }
                if(!$found){
                    return "";
                }
            }
        }

        return $result;
    }
}

?>

</body>
</html>