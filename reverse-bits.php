<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/reverse-bits/
Lesson learned: 
- For PHP, this problem is matter of knowing bitwise related functions
- Asking ChatGPT to optimize my code did NOT improve runtime
- Memory allocation was improved when I asked ChatGPT to "further optimize for the fastest runtime" but not runtime.
*/

$solution = new Solution();
$result;


class Solution {
    /**
     * @param Integer $n
     * @return Integer
     * 
     * Runtime 7ms beats 68.09%, Memory 19.81mb beats 59.57%
     */
    function reverseBits($n) {

        $bit = decbin($n);
        $length = 32 - strlen($bit);
        
        return bindec(strrev($bit) . str_repeat("0", $length));
    }

    /**
     * @param Integer $n
     * @return Integer
     * 
     * Runtime 10ms beats 48.94%, Memory 19.90mb beats 59.57%
     */
    function reverseBitsChatGPT($n) {

        $bit = decbin($n);
        $length = 32 - strlen($bit);
        
        return bindec(strrev($bit) . str_repeat("0", $length));
    }

    /**
     * @param Integer $n
     * @return Integer
     * 
    * Runtime 12ms beats 29.79%, Memory 19.77mb beats 80.85%%
     */
    function reverseBitsChatGPTOptimizeRuntime($n) {
        $result = 0;
        for ($i = 0; $i < 32; $i++) {
            // Shift result to the left to make space for the next bit
            $result <<= 1;
            // Add the least significant bit of n to result
            $result |= ($n & 1);
            // Shift n to the right to process the next bit
            $n >>= 1;
        }
        return $result;
    }
}

?>

</body>
</html>