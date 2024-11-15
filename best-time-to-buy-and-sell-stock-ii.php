<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/best-time-to-buy-and-sell-stock-ii/
Lesson learned: 
- don't overthink it, just buy and sell whenever you can make a profit.
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     * 
     * Runtime 0ms beats 100%, Memory 20.71 beats 66.83%
     */
    function maxProfit($prices) {
        $beforeP = $prices[0];
        $profit = 0;

        for($i = 1; $i < count($prices); $i++){
            $net = $prices[$i] - $beforeP;
            if($net > 0) $profit += $net;
            $beforeP = $prices[$i];
        }

        return $profit;
    }
}

?>

</body>
</html>