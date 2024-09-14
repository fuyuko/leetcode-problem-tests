<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/add-two-numbers/
Lesson learned: 
- don't forget "new" keyword when declaring a class instance
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     * 
     * Runtime 8ms beats 93.44%, Memory 19.87mb beats 81.00%
     */
    function addTwoNumbers($l1, $l2) {
        $currentval = $l1->val + $l2->val;
        $p1 = $l1->next;
        $p2 = $l2->next;
        $carry = false;
        
        if($currentval > 9){
            $carry = true;
            $currentval = $currentval - 10;
        }

        $result = new ListNode($currentval);
        $p = $result;

        while(($p1 !== null) OR ($p2 !== null)){
            if($p1 === null){
                $currentval = $p2->val;
            }elseif($p2 === null){
                $currentval = $p1->val;
            }else{
                $currentval = $p1->val + $p2->val;
            }

            if($carry){
                $currentval +=1;
            }
            if($currentval > 9){
                $carry = true;
                $currentval = $currentval - 10;
            }else{
                $carry = false;
            }

            $p->next = new ListNode($currentval);
            $p = $p->next;
            if($p1 !== null) $p1 = $p1->next;
            if($p2 !== null) $p2 = $p2->next;
        }

        if($carry){
            $p->next = new ListNode(1);
        }

        return $result;
    }
}
?>

</body>
</html>