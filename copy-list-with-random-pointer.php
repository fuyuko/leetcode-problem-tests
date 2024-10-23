<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/copy-list-with-random-pointer/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $next = null;
 *     public $random = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->next = null;
 *         $this->random = null;
 *     }
 * }
 */

 class Solution {
    /**
     * @param Node $head
     * @return Node
     * 
     * Runtime 8ms beats 80.95%, Memory 21.58mb beats 80.95%
     */
    function copyRandomList($head) {
        if($head === null) return $head;

        $h_ptr = $head;
        $new = new Node($head->val);
        $n_ptr = $new;
        $counter = 0;

        while($h_ptr->next !== null){
            $n_ptr->next = new Node($h_ptr->next->val);
            $h_ptr->val = $counter;
            //var_dump($h_ptr->val);
            $map[$counter] = $n_ptr;
            $counter++;
            $n_ptr = $n_ptr->next;
            $h_ptr = $h_ptr->next;
        }
        $h_ptr->val = $counter;
        $map[$counter] = $n_ptr;

        //var_dump($head);
        $h_ptr = $head;
        $n_ptr = $new;

        while($h_ptr->next !== null){
            if($h_ptr === null){
                $n_ptr = null;
            }else{
                var_dump($h_ptr->random->val);
                $n_ptr->random = $map[$h_ptr->random->val]; //index
            }
            $h_ptr = $h_ptr->next;
            $n_ptr = $n_ptr->next;
        }
        if($h_ptr === null){
            $n_ptr = null;
        }else{
            var_dump($h_ptr->random->val);
            $n_ptr->random = $map[$h_ptr->random->val]; //index
        }

        return $new;
    }
}

?>

</body>
</html>