<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/longest-consecutive-sequence/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 
     * Runtime 45ms beats 100%, Memory 29.22mb beats 81.94%
     */
    function longestConsecutive($nums) {
        $length = count($nums);
        if($length < 2) return $length;

        $map = array();

        for($i=0; $i<$length; $i++){
            $map[$nums[$i]] = 1;
        }

        ksort($map);

        //var_dump($map);

        $max_consecutive = 0;
        $current = 0;
        $ptr = array_key_first($map);

        foreach($map as $key => $val){
            if(abs($key-$ptr) < 2){
                $current++;
            }else{
                if($current > $max_consecutive){
                    $max_consecutive = $current;  
                }
                $current = 1;
            }
            $ptr = $key;
        }

        if($current > $max_consecutive){
            $max_consecutive = $current;
        }

        return $max_consecutive;
    }
}

?>

</body>
</html>