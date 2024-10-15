<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/implement-trie-prefix-tree/
Lesson learned: 
- Defintion of Trie = a tree-like data structure used for efficient retrieval of key-value pairs
-
*/

// Runtime 100ms beats 17.95%, memory 41.84bm beats 35.9%
class Trie {
    public $word = 0;
    public $next = array(); //associative array of alphabets

    /**
     */
    function __construct() {
        
    }
  
    /**
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $letters = str_split($word);
        $ptr = $this;
        for($i=0; $i < count($letters); $i++){
            if($ptr->next[$letters[$i]] === null){
                $newTrie = new Trie();
                $ptr->next[$letters[$i]] = $newTrie;
            }
            $ptr = $ptr->next[$letters[$i]];
        }
        $ptr->word++;
    }
  
    /**
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $letters = str_split($word);
        $ptr = $this;
        if(count($ptr->next) === 0) return false;
        for($i=0; $i < count($letters); $i++){
            if($ptr->next[$letters[$i]] === null){
                return false;
            }
            $ptr = $ptr->next[$letters[$i]];
        }
        if($ptr->word === 0){
            return false;
        }
        return true;
    }
  
    /**
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $letters = str_split($prefix);
        $ptr = $this;
        if(count($ptr->next) === 0) return false;
        for($i=0; $i < count($letters); $i++){
            if($ptr->next[$letters[$i]] === null){
                return false;
            }
            $ptr = $ptr->next[$letters[$i]];
        }
        return true;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */

?>

</body>
</html>