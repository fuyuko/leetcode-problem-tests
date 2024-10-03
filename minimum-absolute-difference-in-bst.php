<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/minimum-absolute-difference-in-bst/
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
     * @return Integer
     * 
     * Runtime 30 ms beats 5.71%, Memory 22.26mb beats 14.29%
     */
    function getMinimumDifference($root) {
        $vals[$root->val] = 1;

        if($root->left !== null){
            $zeroFound = $this->buildVals($root->left, $vals);
            if($zeroFound){
                return 0;
            }
        }
        if($root->right !== null){
            $zeroFound = $this->buildVals($root->right, $vals);
            if($zeroFound){
                return 0;
            }
        }
        ksort($vals);
        $vals = array_keys($vals);
        $min = $vals[1] - $vals[0];
        for($i = 2; $i < count($vals); $i++){
            $dif = $vals[$i] - $vals[$i-1];
            if($dif === 1) return 1;
            if($dif < $min) $min = $dif;
        }
        var_dump($vals);
        return $min;
    }

    function buildVals($root, &$vals){
        if($vals[$root->val] !== null){
            return true;
        }

        $vals[$root->val] = 1;

        if($root->left !== null){
            $zeroFound = $this->buildVals($root->left, $vals);
            if($zeroFound){
                return true;
            }
        }
        if($root->right !== null){
            $zeroFound = $this->buildVals($root->right, $vals);
            if($zeroFound){
                return true;
            }
        }

        return false;
    }
}

?>

</body>
</html>