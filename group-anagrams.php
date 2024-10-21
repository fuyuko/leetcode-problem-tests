<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/group-anagrams/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     * 
     * Runtime 14 ms beats 99.36%, Memory 24.89mb beats 21.66%
     */
    function groupAnagrams($strs) {
        $label = $this->sortStr($strs[0]);
        $result = array($label => array($strs[0]));
        echo $label;

        for($i = 1; $i < count($strs); $i++){
            $label = $this->sortStr($strs[$i]);
            $result[$label][] = $strs[$i];
        }

        return $result;
    }

    function sortStr($str){
        $s = str_split($str);
        sort($s);
        return implode("", $s);
    }
}
?>

</body>
</html>