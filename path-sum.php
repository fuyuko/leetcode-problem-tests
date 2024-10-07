<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/path-sum/
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
     * @param Integer $targetSum
     * @return Boolean
     * 
     * Runtime 15ms beats 19.63%, Memory 20.82mb beats 48.60%
     */
    function hasPathSum($root, $targetSum) {
        if(($root->left === null) && ($root->right === null)){
            if($root->val === $targetSum){
                return true;
            }
            return false;
        }

        $result = array_merge($this->getPathSum($root->left), $this ->getPathSum($root->right));

        for($i = 0; $i < count($result); $i++){
            if($result[$i]+$root->val === $targetSum){
                return true;
            }
        }
        return false;
    }

    function getPathSum($root){
        if($root === null) return array();
        if(($root->left === null) && ($root->right === null)){
            return array($root->val);
        }

        $result = array_merge($this->getPathSum($root->left), $this ->getPathSum($root->right));

        for($i = 0; $i < count($result); $i++){
            $result[$i] += $root->val;
        }

        return $result;
    }

}

?>

</body>
</html>