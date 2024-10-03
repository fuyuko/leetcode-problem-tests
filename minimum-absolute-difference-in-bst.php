<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/minimum-absolute-difference-in-bst/
Lesson learned: 
- This particular BST doesn't allow duplicate values in the tree
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
     * Took an advantage of BTS structure 
     * Runtime 12ms beats 68.57%, Memory 21.29mb beats 94.29%
     */
    function getMinimumDifference($root) {
        $lv = null;
        $rv = null;

        if($root->left !== null){
            $lv = $this->findClosestLeft($root->left);
        }
        if($root->right !== null){
            $rv = $this->findClosestRight($root->right);
        }

        //if($lv === null && $rv === null) return -1;

        $lv = $lv ?? $rv;
        $rv = $rv ?? $lv;

        $lv = abs($root->val - $lv);
        $rv = abs($root->val - $rv);
        //echo "left = " . $lv . " right = " . $rv . "\n";
        $min = min($lv, $rv);

        if($min === 1) return 1;

        if($root->left !== null){
            $this->getNextMinDifference($root->left, $min);
        }
        if($root->right !== null){
            $this->getNextMinDifference($root->right, $min);
        }

        return $min;
    }

    function getNextMinDifference(&$root, &$min){
        if($root->left === null && $root->right === null) return;

        if($root->left !== null){
            $lv = $this->findClosestLeft($root->left);
        }
        if($root->right !== null){
            $rv = $this->findClosestRight($root->right);
        }

        $lv = $lv ?? $rv;
        $rv = $rv ?? $lv;

        $lv = abs($root->val - $lv);
        $rv = abs($root->val - $rv);

        //echo "left = " . $lv . " right = " . $rv . "\n";

        if($min > min($lv, $rv)){
            $min = min($lv, $rv);
        }

        if($root->left !== null){
            $this->getNextMinDifference($root->left, $min);
        }
        if($root->right !== null){
            $this->getNextMinDifference($root->right, $min);
        }
    }

    function findClosestLeft(&$root){
        if($root->right === null){
            return $root->val;
        }
        return $this->findClosestLeft($root->right);
    }

    function findClosestRight(&$root){
        if($root->left === null){
            return $root->val;
        }
        return $this->findClosestRight($root->left);
    }

    /**
     * @param TreeNode $root
     * @return Integer
     * 
     *  Still slow...
     *  Runtime 20 ms beats 14.29%, Memory 21.26mb beats 94.29%
     */
    function getMinimumDifferenceNoDuplicateNode($root) {
        $vals[$root->val] = 1;

        if($root->left !== null){
            if($root->val - $root->left->val === 1) return 1;
            $oneFound = $this->buildVals2($root->left, $vals);
            if($oneFound){
                return 1;
            }
        }
        if($root->right !== null){
            if($root->right->val - $root->val === 1) return 1;
            $oneFound = $this->buildVals2($root->right, $vals);
            if($oneFound){
                return 1;
            }
        }
        ksort($vals);
        $vals = array_keys($vals);
        $min = $vals[1] - $vals[0];
        for($i = 2; $i < count($vals); $i++){
            $dif = $vals[$i] - $vals[$i-1];
            if($dif === 2) return 2;
            if($dif < $min) $min = $dif;
        }
        var_dump($vals);
        return $min;
    }

    function buildVals2($root, &$vals){

        $vals[$root->val] = 1;

        if($root->left !== null){
            if($root->val - $root->left->val === 1) return true;
            $oneFound = $this->buildVals2($root->left, $vals);
            if($oneFound){
                return true;
            }
        }
        if($root->right !== null){
            if($root->right->val - $root->val === 1) return true;
            $oneFound = $this->buildVals2($root->right, $vals);
            if($oneFound){
                return true;
            }
        }
        return false;
    }

    /**
     * @param TreeNode $root
     * @return Integer
     * 
     * Slow because it considered possible duplicate values in the tree.
     * Runtime 30 ms beats 5.71%, Memory 22.26mb beats 14.29%
     */
    function getMinimumDifferenceAllowDuplicate($root) {
        $vals[$root->val] = 1;

        if($root->left !== null){
            $zeroFound = $this->buildVals1($root->left, $vals);
            if($zeroFound){
                return 0;
            }
        }
        if($root->right !== null){
            $zeroFound = $this->buildVals1($root->right, $vals);
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

    function buildVals1($root, &$vals){
        if($vals[$root->val] !== null){
            return true;
        }

        $vals[$root->val] = 1;

        if($root->left !== null){
            $zeroFound = $this->buildVals1($root->left, $vals);
            if($zeroFound){
                return true;
            }
        }
        if($root->right !== null){
            $zeroFound = $this->buildVals1($root->right, $vals);
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