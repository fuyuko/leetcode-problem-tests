<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/construct-binary-tree-from-inorder-and-postorder-traversal/
Lesson learned: 
- easy after solving "Construct Binary Tree from Preorder and Inorder Traversal"
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
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     * Runtime: 34ms beats 33.33%, Memory 99.04mb beats 23.53%
     */
    function buildTree($inorder, $postorder) {
        if(count($inorder) === 1) return new TreeNode($inorder[0]);

        $nodevalue = array_pop($postorder);
        $root = new TreeNode($nodevalue);

        $pos = array_search($nodevalue, $inorder);
        $left = null;
        $right = null;

        if($pos !== 0) $left = array_slice($inorder, 0, $pos);
        if($pos !== count($inorder)-1) $right = array_slice($inorder, $pos+1);

        if ($right !== null) $root->right = $this->handleNext($right, $postorder);
        if ($left !== null) $root->left = $this->handleNext($left, $postorder);

        return $root;
    }

    function handleNext(&$inorder, &$postorder){
        $nodevalue = array_pop($postorder);
        $node = new TreeNode($nodevalue);

        if(count($postorder) === 0) return $node;

        $pos = array_search($nodevalue, $inorder);
        $left = null;
        $right = null;

        if($pos !== 0) $left = array_slice($inorder, 0, $pos);
        if($pos !== count($inorder)-1) $right = array_slice($inorder, $pos+1);

        //var_dump($right);

        if ($right !== null) $node->right = $this->handleNext($right, $postorder);
        if ($left !== null) $node->left = $this->handleNext($left, $postorder);

        return $node;

    }
}
?>

</body>
</html>