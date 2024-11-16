<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal/
Lesson learned: 
-  handleLeft() and handleRight() are identical -> can be refactored into one function, handleNext()
-  didn't know what preordering and inordering meant, had to look it up.
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
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     * 
     * Runtime 41ms beats 50%, Memory 98.96mb beats 52.17%
     */
    function buildTree($preorder, $inorder) {
        $count = count($inorder);
        $root = new TreeNode($preorder[0]);
        array_shift($preorder);
        if($count === 1) return $root;

        $inorder_root = array_search($root->val, $inorder);
        $inorder_left = null;
        $inorder_right = null;

        if($inorder_root > 0) $inorder_left = array_slice($inorder, 0, $inorder_root);
        if($inorder_root < $count-1) $inorder_right = array_slice($inorder, $inorder_root+1);

        if($inorder_left !== null){
            $root->left = $this->handleNext($preorder, $inorder_left);
        }
        if($inorder_right != null){
            $root->right = $this->handleNext($preorder, $inorder_right);
        }
        
        return $root;
    }

    function handleNext(&$preorder, &$inorder){
        $count = count($inorder);
        $root = new TreeNode($preorder[0]);
        array_shift($preorder);

        if($count === 1) return $root;

        $inorder_root = array_search($root->val, $inorder);
        $inorder_left = null;
        $inorder_right = null;

        if($inorder_root > 0) $inorder_left = array_slice($inorder, 0, $inorder_root);
        if($inorder_root < $count-1) $inorder_right = array_slice($inorder, $inorder_root+1);

        if($inorder_left !== null){
            $root->left = $this->handleNext($preorder, $inorder_left);
        }
        if($inorder_right != null){
            $root->right = $this->handleNext($preorder, $inorder_right);
        }
        return $root;

    }
}
?>

</body>
</html>