<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/merge-two-sorted-lists/
Lesson learned: 
-  Don't forget to remove test output before submit
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

class Solution1 {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     * 
     * Runtime 8ms beats 61.86%%, Memroy 20.23mb beats 12.09%
     */
    function mergeTwoLists($list1, $list2) { 
        $result = $list1;
        if($list1 === null){
            return $list2; //covers $list1 == null & $list2 = null
        }else{
            if($list2 === null){
                return $list1;
            }
            //$list1 != null && $list2 != null
            if($list1->val > $list2->val){
                $result = $list2;
                $list2 = $list2->next;
            }else{
                $list1 = $list1->next; //$result is already assigned
            }
        }
        //echo "list1 = " . $list1->val . " list2 = " . $list2->val . "\n";
        $current = $result;

        while(($list1 !== null) && ($list2 !== null)){
            if($list1->val < $list2->val){
                $current->next = $list1;
                $list1 = $list1->next; 
            }else{
                $current->next = $list2;
                $list2 = $list2->next; 
            }
            $current = $current->next;
            //echo "list1 = " . $list1->val . " list2 = " . $list2->val . "\n";
            //var_dump($result);
        }

        if($list1 !== null){
            $current->next = $list1;
        }elseif($list2 !== null){
            $current->next = $list2;
        }else{
            $current->next = null;
        }

        return $result;
    }
}

?>

</body>
</html>