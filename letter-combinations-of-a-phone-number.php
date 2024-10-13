<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/letter-combinations-of-a-phone-number/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $digits
     * @return String[]
     * 
     * Runtime 7ms beats 54.24%, Memory 18.86mb beats 100%
     */
    function letterCombinations($digits) {
        $size = strlen($digits);
        if($size < 1) return array();

        $map = [
            "2" => array("a", "b", "c"),
            "3" => array("d", "e", "f"),
            "4" => array("g", "h", "i"),
            "5" => array("j", "k", "l"),
            "6" => array("m", "n", "o"),
            "7" => array("p", "q", "r", "s"),
            "8" => array("t", "u", "v"),
            "9" => array("w", "x", "y", "z")
        ];

        if($size === 1) return $map[$digits[0]];

        $d = str_split($digits);
        $result = $map[$digits[0]];

        for($i = 1; $i < $size; $i++){
            $result = $this->combArray($result, $map[$d[$i]]);
        }

        return $result;
    }

    function combArray($array1, $array2){
        $result = array();

        foreach($array1 as $item1){
            foreach($array2 as $item2){
                $result[] = $item1 . $item2;
            }
        }

        return $result;
    }


}

?>

</body>
</html>