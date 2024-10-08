<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/single-number/
Lesson learned: 
- XOR is 0 when XOR-ing the same number
- XOR method saves memory but no Runtime improvement
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 
     * Runtime 44ms beats 32.20%, Memory 20.86 beats 96.61%
     */
    function singleNumber($nums) {
        
        $result = 0;
        foreach($nums as $num){
            $result ^= $num;
        }

        return $result;
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     * 
     * Runtime 44ms beats 32.20% Memory 21.70mb beats 48.73%
     */
    function singleNumberNotBit($nums) {
        $count = array();

        foreach($nums as $n){
            $count[$n]++;
        }
        return array_search(1, $count);
    }
}

?>

</body>
</html>