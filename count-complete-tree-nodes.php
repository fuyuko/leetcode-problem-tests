<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/count-complete-tree-nodes/
Lesson learned: 
- cleaner code (class Solution) runs slower but saves memory
- code that trys to return result qucker (class Solution1) runs faster but uses more memory
- def. of a complete binary tree = a special type of binary tree where all the levels of the tree a filled
completely except the lower level nodes which are filled from as left as possible.
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
 * 
 * Runtime 19ms beats 59.09%, Memory 26.12MB beats 56.82%
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function countNodes($root) {
        
        if($root == null){
            return 0; 
        }

        $result = 1;

        if($root->left != null) {
            $result += $this->countNodes($root->left);
        }
        if($root->right != null){
            $result += $this->countNodes($root->right);
        }
        return $result;

    }
}

/**
 * Runtime 16ms beats 79.55%, Memory 26.37MB beats 11.36%
 */
class Solution1 {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function countNodes($root) {
        
        if($root == null){
            return 0; 
        }

        $result = 1;

        if($root->left === null) {
            return $result;
        }
        $result += $this->countNodes($root->left);
        if($root->right === null){
            return $result;
        }
        $result += $this->countNodes($root->right);
        return $result;

    }
}
?>

</body>
</html>