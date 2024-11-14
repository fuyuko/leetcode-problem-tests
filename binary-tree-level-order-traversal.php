<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/binary-tree-level-order-traversal/
Lesson learned: 
- Easy peasy.
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
     * @return Integer[][]
     * Runtime 0ms beats 100%, Memory 21.92mb beats 6.12%
     */
    function levelOrder($root) {
        if($root === null) return array();

        $result = array(array($root->val));

        if($root->left !== null){
            $this->search($root->left, 1, $result);
        }
        if($root->right !== null){
            $this->search($root->right, 1, $result);
        }
        return $result;
    }

    function search(&$root, $level, &$result){
        $result[$level][] = $root->val;
        if($root->left !== null){
            $this->search($root->left, $level+1, $result);
        }
        if($root->right !== null){
            $this->search($root->right, $level+1, $result);
        }
    }
}

?>

</body>
</html>