<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/clone-graph/
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
 *     public $neighbors = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->neighbors = array();
 *     }
 * }
 */

 class Solution {
    /**
     * @param Node $node
     * @return Node
     * 
     * Runtime 8 ms beats 53.85%, Memory 20.65mb beats 71.43%
     */
    function cloneGraph($node) {
        if($node === null) return $node;

        $result = new Node($node->val);
        $map[$node->val] = $result;
        if(count($node->neighbors) === 0) return $result;

        foreach($node->neighbors as $neighbor){
            if($map[$neighbor->val] === null){
                $this->setupNewNode($map, $neighbor);
            }
            $result->neighbors[] = $map[$neighbor->val];
        }
        
        return $result;
    }

    function setupNewNode(&$map, &$original){
        //$map[$original->val] did NOT exist before
        $map[$original->val] = new Node($original->val);

        foreach($original->neighbors as $neighbor){
            if($map[$neighbor->val] === null){
                $this->setupNewNode($map, $neighbor);
            }
            $map[$original->val]->neighbors[] = $map[$neighbor->val]; 
        }
    }
}
?>

</body>
</html>