<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/invert-binary-tree/
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
     * @return TreeNode
     * 
     * Runtime 3ms beats 81.82%, memory 19.91mb beats 48.,95%
     */
    function invertTree($root) {
        if($root === null) return $root;

        if(($root->left !== null) && (!$this->isEndNode($root->left))){
            $this->innerInvert($root->left);
        }
        if(($root->right !== null) && (!$this->isEndNode($root->right))){
            $this->innerInvert($root->right);
        }
        $temp = $root->left;
        $root->left = $root->right;
        $root->right = $temp;
        
        return $root;
    }

    function innerInvert(&$root){
        if($root === null) return $root;

        if(($root->left !== null) && (!$this->isEndNode($root->left))){
            $this->innerInvert($root->left);
        }
        if(($root->right !== null) && (!$this->isEndNode($root->right))){
            $this->innerInvert($root->right);
        }
        $temp = $root->left;
        $root->left = $root->right;
        $root->right = $temp;
        
        return;
    }

    function isEndNode(&$root){
        if(($root->left === null) && ($root->right === null)) return true;
        return false;
    }
}

?>

</body>
</html>