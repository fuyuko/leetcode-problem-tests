<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/single-number-ii/
Lesson learned: 
- my solution is not meeting the requirement of O(1) space complexity
- The one that's meet O(1) space complexity is using bit manipulation.
- I found this solution from other solution submissions. I still don't fully understand how it works.

function singleNumber($nums) {
        $ones = 0;
        $twos = 0;

        foreach ($nums as $num) {
          $ones ^= ($num & ~$twos);
          $twos ^= ($num & ~$ones);
        }

        return $ones;
    }
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * 
     * Runtime 1ms beats 84.62%, Memroy 20.86mb beats 64.71%
     */
    function singleNumber($nums) {
        if(count($nums) === 1) return $nums[0];

        $map = array();

        foreach($nums as $num){
            if(!isset($map[$num])) $map[$num] = 1;
            elseif($map[$num] === 1) $map[$num] += 1;
            elseif($map[$num] === 2) unset($map[$num]);
        }
        $keys = key($map);
        return $keys;
    }
}

?>

</body>
</html>