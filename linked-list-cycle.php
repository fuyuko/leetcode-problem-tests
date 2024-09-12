<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/linked-list-cycle/
Lesson learned: 
- difference between == and ===
- need to revisit because this is too inefficient
*/

/* test cases:

[3,2,0,-4]
1
[1,2]
0
[1]
-1
[1]
0
[-1,-7,7,-4,19,6,-9,-5,-2,-5]
9
[]
-1
[1,1]
0
[-21,10,17,8,4,26,5,35,33,-7,-16,27,-12,6,29,-12,5,9,20,14,14,2,13,-24,21,23,-21,5]
-1
 */

$solution = new Solution();
$result;

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

 class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     * 
     * Runtime 1489ms beats 5.22%, Memory 23.02mb beats 74.35%
     */
    function hasCycle($head) {
        if(($head == null) || ($head->next == null)){
            return false;
        }
        
        $current = $head;
        $seen = [];

        while($current->next != null){
            if($current === $current->next) return true;
            foreach($seen as $item){
                if($item === $current){
                    return true;
                }
            }
            $seen[] = $current;
            $current = $current->next;
        }
        return false;
        
    }
}

/**
 * Line 22: PHP Fatal error:  Nesting level too deep - recursive dependency? in solution.php
 */
class SolutionNestTooDeep {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        if($head != null){
            $currentp = $head;
            $nextp = $currentp->next;
            $a = [];

            while($nextp != null){
                if(in_array($nextp, $a)){
                    //return (var_dump($a));
                    return true;
                }
                $a[] = $currentp;
                $currentp = $currentp->next;
                $nextp = $currentp->next; 
            }
        }
        //return (var_dump($a));
        return false;
        
    }
}

?>

</body>
</html>