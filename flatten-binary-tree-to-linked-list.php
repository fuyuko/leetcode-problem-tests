<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/flatten-binary-tree-to-linked-list/
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
     * @return NULL
     * 
     * Runtime 0ms beats 100%, Memory 20.33mb beats 42.86%
     */
    function flatten($root) {

        if(($root === null) || ($this->isEndNode($root))) return $root;

        if($root->right !== null){
            if(!$this->isEndNode($root->right)){
                $this->handle($root->right);
            }     
        }
        
        if($root->left !== null){
            if(!$this->isEndNode($root->left)){
                $this->handle($root->left);
            }
            if($root->right !== null){
                $this->addToRightEnd($root->left, $root->right);
            }
            $root->right = $root->left;
            $root->left = null;
        }
        return $root;
    }

    function isEndNode($node){
        if(($node->left === null) && ($node->right === null)) return true;
        return false;
    }

    function handle(&$node){

        if($node->right !== null){
            if(!$this->isEndNode($node->right)){
                $this->handle($node->right);
            }          
        }
        if($node->left !== null){
            if(!$this->isEndNode($node->left)){
                $this->handle($node->left);
            }
            if($node->right !== null){
                $this->addToRightEnd($node->left, $node->right);
            }

            //var_dump($node);
            $node->right = $node->left;
            $node->left = null;
        }
    }

    function addToRightEnd(&$node, &$addThis){

        if($node->right === null){
            $node->right = $addThis;
            return;
        }

        $ptr = $node->right;
        while($ptr->right !== null) $ptr = $ptr->right;
        $ptr->right = $addThis;
        return;
    }
}

?>

</body>
</html>