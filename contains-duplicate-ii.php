<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/contains-duplicate-ii/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     * 
     * Runtime 42ms beats 8.7%, Memory 28.26mb beats 60.19%
     */
    function containsNearbyDuplicate($nums, $k) {
        $map = array();
        foreach($nums as $i => $num){
            if($map[$num] === null){
                $map[$num] = $i;
            }else{
                if($i-$map[$num] <= $k){
                    return true;
                }else{
                    $map[$num] = $i;
                }
            }
        }
        return false;
    }
}

?>

</body>
</html>