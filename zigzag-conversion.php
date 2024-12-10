<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/zigzag-conversion/
Lesson learned: 
- According to copilot, the str_split is unnecessary. I can just use $s[$i] to get the character at index $i.
- multiple use of strlen() doesn't seem to impact the performance.
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     * 
     * Runtime 10ms beats 40.79%, Memory 20.83mb beats 7.22%
     */
    function convert($s, $numRows) {
        if(($numRows === 1) || ($numRows >= strlen($s))) return $s;

        $loop = $numRows*2 - 2;

        for($i = 0; $i < strlen($s); $i++){
            $result_index = $i%$loop;

            if($result_index >= $numRows){
                $result_index = $numRows*2 - $result_index - 2;
            }
            $result[$result_index] = $result[$result_index] . $s[$i];

        }

        return implode($result);
    }
}

?>

</body>
</html>