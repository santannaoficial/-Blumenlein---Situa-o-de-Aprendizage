<?php
    function RemoveSpecialChar($str){
        $res = str_replace(array('(', ')', '"', ',' , ';', '<', '>', '-', '.', '[', ']', '{', '}', ' ', '_'), '', $str);
        return $res;
    }
?>