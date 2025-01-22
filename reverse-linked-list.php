<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/reverse-linked-list/
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
     * @return ListNode
     * 
     * Runtime 0ms beats 100%, Memory 22.46mb beats 15.79%
     */
    function reverseList($head) {
        if(($head === null) || ($head->val === null)) return $head;
        
        $result = new ListNode($head->val);
        $ptr = $head->next;

        while($ptr !== null){
             $temp = new ListNode($ptr->val, $result);
             $result = $temp;
             $ptr = $ptr->next;
        }

        return $result;
    }
}
?>

</body>
</html>