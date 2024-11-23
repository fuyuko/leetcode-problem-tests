<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/populating-next-right-pointers-in-each-node-ii/
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

 class Solution {
    /**
     * @param Node $root
     * @return Node
     * Runtime 25ms beats 100%, Memory 23.13mb beats 12.50%
     */
    public function connect($root) {
        if($root === null) return $root;
        $level = 0;
        $rightNodes = array();

        if($root->right !== null){
            $this->traverseChild($root->right, $level+1, $rightNodes);
        }
        if($root->left !== null){
            $this->traverseChild($root->left, $level+1, $rightNodes);
        }

        return $root;
    }

    function traverseChild(&$node, $level, &$rightNodes){
        if(!isset($rightNodes[$level])){ //this is the most right node at the level
            $rightNodes[$level] = $node;
        }else{
            $node->next = $rightNodes[$level];
            $rightNodes[$level] = $node;
        }

        if($node->right !== null){
            $this->traverseChild($node->right, $level+1, $rightNodes);
        }
        if($node->left !== null){
            $this->traverseChild($node->left, $level+1, $rightNodes);
        }
    }
}

?>

</body>
</html>