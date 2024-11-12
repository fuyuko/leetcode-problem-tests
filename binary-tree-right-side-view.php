<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/binary-tree-right-side-view/
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
     * @return Integer[]
     * 
     * Runtime 0ms beats 100%, Memory 19.98mb beats 50%
     */
    function rightSideView($root) {
        if($root === null) return array();
        if($root->val === null) return array();

        $result[] = $root->val;
        $maxrightdepth = 0;
        $currentdepth = 0;

        if($root->right != null){
            $this->handleRight($root->right, $result, $currentdepth+1, $maxrightdepth);
        }
        if($root->left != null){
            $this->handleLeft($root->left, $result, $currentdepth+1, $maxrightdepth);
        }

        return $result;
    }

    function handleRight(&$root, &$result, $currentdepth, &$maxrightdepth){
        //echo "handleright: maxdepth = " . $maxrightdepth . " current = " . $currentdepth . " val = " . $root->val . "\n";
        if($maxrightdepth < $currentdepth){
            //echo "result should be added.\n";
            $result[] = $root->val;
            //var_dump($result);
            $maxrightdepth = $currentdepth;
        } 

        if($root->right != null){
            $this->handleRight($root->right, $result, $currentdepth+1, $maxrightdepth);
        }
        if($root->left != null){
            $this->handleLeft($root->left,  $result, $currentdepth+1, $maxrightdepth);
        }
    }

    function handleLeft(&$root, &$result, $currentdepth, &$maxrightdepth){
        //echo "handleleft: maxdepth = " . $maxrightdepth . " current = " . $currentdepth . " val = " . $root->val . "\n";
        if($maxrightdepth < $currentdepth){
            $result[] = $root->val;
            $maxrightdepth = $currentdepth;
        } 

        if($root->right != null){
            $this->handleRight($root->right, $result, $currentdepth+1, $maxrightdepth);
        }
        if($root->left != null){
            $this->handleLeft($root->left, $result, $currentdepth+1, $maxrightdepth);
        }
    }
}

?>

</body>
</html>