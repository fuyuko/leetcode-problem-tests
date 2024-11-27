<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/kth-smallest-element-in-a-bst
Lesson learned: 
- 
-
*/

$solution = new Solution();
$result;


/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     * 
     * Runtime 0ms beats 100%, Memory 23.03mb beats 25%
     */
    function kthSmallest($root, $k) {
        $count = 0;
        $found = null;
        
        if($root->left !== null){
            $found = $this->countChildren($root->left, $k, $count);
        }
        if($found === null){
            $count++;
            if($count === $k)  $found = $root->val;
        }

        if($found !== null) return $found;
        
        if($root->right !== null){
            $found = $this->countChildren($root->right, $k, $count);
        }

        return $found;
    }

    function countChildren(&$node, &$k, &$count){
        $found = null;

        if($node->left !== null){
            $found = $this->countChildren($node->left, $k, $count);
        }
        if($found === null){
            $count++;
            if($count === $k)  $found = $node->val;
        }

        if($found !== null) return $found;
        
        if($node->right !== null){
            $found = $this->countChildren($node->right, $k, $count);
        }

        return $found;
        
    }
}

?>

</body>
</html>