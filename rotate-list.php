<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/rotate-list/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     * 
     * Runtime 0ms beats 100%, Memory 19.71mb beats 83.33%
     */
    function rotateRight($head, $k) {

        if($head === null) return null;

        $length = 0;
        $ptr = $head;
        $last = null;

       do{
            if($ptr->next === null){
                $last = $ptr;
            }
            $length += 1;
            $ptr = $ptr->next;
        }while($ptr !== null);

        $last->next = $head;

        if($k >= $length) $step = $k % $length;
        else $step = $k;

        if($step == 0){
            $last->next = $null;
            return $head;
        } 

        $step = $length - $step; 
        
        for($i = 1; $i <= $step; $i++){
            $last = $head;
            $head = $head->next;
        }

        $last->next = null;

        return $head;

    }
}

?>

</body>
</html>