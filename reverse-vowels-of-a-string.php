<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/reverse-vowels-of-a-string/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $s
     * @return String
     * 
     * Runtime: 4 ms beats 97.76%, Memory 21MB beats 90.58%d
     */
    function reverseVowels($s) {
        $count = strlen($s);
        $lastVowel = $count-1;
        $result = $s;
        for($i = 0; $i <= $lastVowel; $i++){
            if($this->isVowel($result[$i])){
                for($j = $lastVowel; $j > $i; $j--){
                    if($this->isVowel($result[$j])){
                        $temp = $result[$i];
                        $result[$i] = $result[$j];
                        $result[$j] = $temp;
                        $lastVowel = $j-1;
                        break;
                    }
                }
            }
        }
        return $result;

    }

    function isVowel($s){
        switch($s){
            case "a":
            case "A":
            case "e":
            case "E":
            case "i":
            case "I":
            case "o":
            case "O":
            case "u":
            case "U":
                return true;
                break;
            default:
                return false;
        }
    }
}

?>

</body>
</html>