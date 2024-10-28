<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: 
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
     * @return Boolean
     * 
     * Runtime: 0ms beats 100%, Memory 20.43mb beats 5.32%
     */
    function isSymmetric($root) {
        if($root->left->val === $root->right->val){
            $result1 = $this->innerIsSymmetric($root->left->left, $root->right->right);
            $result2 = $this->innerIsSymmetric($root->left->right, $root->right->left);

            return ($result1 && $result2);
        }else{
            return false;
        }

    }

    function innerIsSymmetric($left, $right){
        if(($left === null) && ($right === null)) return true;
        if(($left === null) && ($right !== null)) return false;
        if(($left !== null) && ($right === null)) return false;

        if($left->val === $right->val){
            $result1 = $this->innerIsSymmetric($left->left, $right->right);
            $result2 = $this->innerIsSymmetric($left->right, $right->left);
            return ($result1 && $result2);
        }else{
            return false;
        }
    }
}

?>

</body>
</html>