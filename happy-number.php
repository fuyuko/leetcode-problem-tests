<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/happy-number/submissions/1378551288/
Lesson learned: 
- didn't really solve how to catch infinite loop correctly
- is adding case 3-9 after testing each case for infinite loop considered cheating?
*/

$solution = new Solution();
$result = $solution->isHappy(11);


class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     * 
     *  Runtime 11ms beats 32.81%, memory 19.18MB beats 100%
     */
    function isHappy($n) {
        switch($n){
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 8:
            case 9:
                return false;
            case 1:
            case 7:
                return true;
            default:
                $nums = str_split(strval($n));
                var_dump($nums);
                $sum = 0;
                for($x = 0; $x < count($nums); $x++){
                    $sum = $sum + pow(intval($nums[$x]), 2);
                }
                echo "sum = " . $sum . "\n";
                return $this->isHappy($sum);
        }
    }
}

?>

</body>
</html>