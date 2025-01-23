<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/find-the-difference-of-two-arrays/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[][]
     * 
     * Runtime 4ms beats 88.52%, Memory 20.46mb beats 100%
     */
    function findDifference($nums1, $nums2) {
        $i1 = count($nums1);
        $i2 = count($nums2);
        $index = max($i1, $i2);

        $n1 = array();
        $n2 = array();

        for($i = 0; $i < $index; $i++){
            if($i < $i1){
                $n1[$nums1[$i]] = 1;
            }
            if($i < $i2){
                $n2[$nums2[$i]] = 1;
            }
        }

        foreach($n1 as $i => $v){
            if(isset($n2[$i])){
                unset($n2[$i]);
                unset($n1[$i]);
            }
        }
        
        $result[] = array_keys($n1);
        $result[] = array_keys($n2);

        return $result;

        
    }
}

?>

</body>
</html>