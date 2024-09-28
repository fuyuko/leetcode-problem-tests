<!DOCTYPE html>
<html>
<body>

<?php

/*
Problem: https://leetcode.com/problems/simplify-path/?
Lesson learned: 
-  exploding the path didn't work well for repeated patterns like "/../../"
-
*/

$solution = new Solution();
$result;


class Solution {

    /**
     * @param String $path
     * @return String
     * 
     * Runtime 4 ms beats 87.27%, Memory 20.17mb beats 7.27%
     */
    function simplifyPath($path) {
        $path = $path . "/"; //force to have "/" at the end in the beginning
        while(str_contains($path, "/./")){
             $path = str_replace ("/./", "/", $path); //remove unnecessary "current directory"
        }
        $path = preg_replace("/\/{2,}/", "/", $path); //remove duplicate "/"

        while(($p = strpos($path, "/../")) !== false){
            if($p === 0){
                $path = "/" . substr($path, 4);
            }else{
                $pRemove = strrpos(substr($path, 0, $p), "/");
                $path = substr($path, 0, $pRemove) . "/" . substr($path, $p+4);
            }
        }

        $path = preg_replace("/\/{2,}/", "/", $path); //remove duplicate "/"
        if(strlen($path) > 1){
            $path = rtrim($path, "/"); //remove last "/" if any
        }

        return $path;
    }
}


/*
Test cases:

"/home/"
"/home//foo/"
"/home/user/Documents/../Pictures"
"/./"
"/../"
"/a//b////c/d//././/.."
"/home/../../.."
"/./yPvI/./X/../cCwm/../../."
"/.././em/jl///../.././../E/"

*/

?>

</body>
</html>