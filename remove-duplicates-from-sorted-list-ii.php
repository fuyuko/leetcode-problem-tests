<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/remove-duplicates-from-sorted-list-ii/
Lesson learned: 
-  creating inner functions will help organize the code/logic
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
     * Runtime 1ms beats 60%, Memory 20.38mb beats 9.52
     */
    function deleteDuplicates($head) {
        if(($head === null)||($head->next === null)){
            return $head;
        }

        $current_ptr = $head;
        $result_head = null;
        $result_current = null;

        while($current_ptr !== null){
            $distinct = $this->isNumDistinct($current_ptr->val, $current_ptr);
            if($distinct){
                if($result_head === null){
                    $result_head = $current_ptr;
                    $result_current = $result_head;
                }else{
                    $result_current->next = $current_ptr;
                    $result_current = $result_current->next;
                }
                $current_ptr = $current_ptr->next;
            }else{
                $current_ptr = $this->findNextNumPtr($current_ptr->val, $current_ptr);
            }
        }
        
        if($result_current !== null) $result_current->next = null;

        return $result_head;

    }

    function isNumDistinct(&$num, &$head){
        if($head->next === null) return true;
        if($num !== $head->next->val){
            return true;
        }
        return false;
    }

    function findNextNumPtr($num, $head){
        $ptr = $head;
        while(($ptr->val === $num) && ($ptr !== null)){
            $ptr = $ptr-> next;
        }
        return $ptr;
    }
}

?>

</body>
</html>