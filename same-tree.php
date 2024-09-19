<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/same-tree/
Lesson learned: 
- to improve runtime -> more efficient conditional statements & faster result return
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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     * 
     * Runtime 0ms beats 100%, Memory 19.97mb beats 64.29%
     */
    function isSameTree($p, $q) {

        if(
            ($p->val !== $q->val) ||
            (($p->left === null) && ($q->left !== null)) ||
            (($p->left !== null) && ($q->left === null)) ||
            (($p->right !== null) && ($q->right === null)) ||
            (($p->right === null) && ($q->right !== null)) ||
            ((($p->left !== null) && ($q->left !== null)) && (($p->left->value !== $q->left->value) || ($p->right->value !== $q->right->value)))
        ){
            return false;
        }
        
        $result = true;

        if($p->left === null){    
            $result = true;
        }else{
            $result = $this->isSameTree($p->left, $q->left);
        }
        if($result !== false){
            if($p->right === null){
                $result = true;
            }else{
                $result = $this->isSameTree($p->right, $q->right);
            }
            
        }

        return $result;
    }

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     * 
     * Runtime 12 ms beats 13.69%, Memory 19.98mb beats 64.29%
     */
    function isSameTreeInefficient($p, $q) {

        if(
            ($p->val !== $q->val) ||
            (($p->left === null) && ($q->left !== null)) ||
            (($p->right !== null) && ($q->right === null)) ||
            ((($p->left !== null) && ($q->left !== null)) && ($p->left->value !== $q->left->value)) ||
            ((($p->right !== null) && ($q->right !== null)) && ($p->right->value !== $q->right->value))   
        ){
            return false;
        }
        
        $result = true;

        if(($p->left === null) && ($q->left === null)){
            $result = true;
        }else{
            $result = $this->isSameTree($p->left, $q->left);
        }
        if($result !== false){
            if(($p->right === null) && ($q->right === null)){
                $result = true;
            }else{
                $result = $this->isSameTree($p->right, $q->right);
            }
            
        }

        return $result;
    }
}

?>

</body>
</html>