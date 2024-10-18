<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/longest-substring-without-repeating-characters/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

        /**
     * @param String $s
     * @return Integer
     * 
     * Runtime: 23ms beats 49.38%, memory 21.69mb beats 5.75%
     */
    function lengthOfLongestSubstring($s) {
        $length = strlen($s);
        if($length < 2) return $length;

        $a = str_split($s);
        $longest = 0;
        $map = array();
        $end = 0;

        for($i = 0; $i < $length-$longest; $i++){           //$i = start index value
            $end = $this->findNoRepeat($a, $end, $map);
            if(($end-$i) > $longest) $longest = $end-$i;
            unset($map[$a[$i]]);
        }

        return $longest;
    }

    function findNoRepeat(&$a, &$end, &$map){

        for($i=$end; $i < count($a); $i++){
            if($map[$a[$i]] === null){
                $map[$a[$i]] = 1;
            }else{
                return $i;
            }
        }

        return count($a);
    }

    /**
     * @param String $s
     * @return Integer
     * 
     * runtime 1783ms beats 5.14%, memory 22.04mb beats 5.75%
     */
    function lengthOfLongestSubstring1($s) {
        $length = strlen($s);
        if($length < 2) return $length;

        $a = str_split($s);
        $longest = 0;

        for($i = 0; $i < $length-$longest; $i++){
            $current_result = $this->findNoRepeat1(array_slice($a, $i));
            if($current_result > $longest) $longest = $current_result;
        }

        return $longest;
    }

    function findNoRepeat1($array){
        $map = array();
        for($i=0; $i < count($array); $i++){
            if($map[$array[$i]] === null){
                $map[$array[$i]] = 1;
            }else{
                return $i;
            }
        }

        return count($array);
    }
}

?>

</body>
</html>