<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/remove-nth-node-from-end-of-list/
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
     * @param Integer $n
     * @return ListNode
     * 
     * Runtime 0ms beats 100%, Memory 19.89mb beats 72.29%
     */
    function removeNthFromEnd($head, $n) {
        
        if($head->next === null) return array();

        $size = 1;
        $ptr = $head;
        $array = array();

        while($ptr->next !== null){
            $size++;
            $array[] = $ptr;
            $ptr = $ptr->next;
        }

        $delete = $size - $n;

        if($delete === 0){
            $head = $head->next;
            return $head;
        }

        $before = $size - $n - 1;
        $array[$before]->next = $array[$delete]->next;

        return $head;


    }
}

?>

</body>
</html>