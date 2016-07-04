<?php

global $search, $replace;

function encode(){
    $search = array('±', '= ', '+', '¶', '^', 'µ', 'Ø', 'Ƒ', '<', '>', '¿', 'Ü', 'ä', '¬','ñ', '»', '«', 'Õ', '§', '≤', '≥', 'Ñ', 'ë', '≡', 'æ', 'ï', 'ÿ', 'ƒ','ō', 'ã');
    $replace = array('can', 'be', 'and', 'are', 'to', 'by', 'the', 'in', 'for', 'of', 'this', 'is', 'all', 'after','with', 'which', 'it', 'an', 'not', 'that', 'there', 'if', 'was', 'as', 'or', 'at', 'on', 'our','am', 'me');

    $filedata = strtolower(file_get_contents('swami.txt'));
    $data = explode(" ",$filedata);
    $newdata = "";
    $val = 'a';
    if(end($data) == 'de'){
        array_pop($data);
        foreach($data as $name) {
            $newdata .= " ".str_replace($search, $replace, $name);
        }
    }
    else {
        foreach($data as $name) {
            if (in_array($name, $search)){
                $newdata .= $val." ";
                array_push($search, $val);
                array_push($replace, $name);
                $val++;
            }
            else {
                $newdata .= str_replace($replace, $search, $name)." ";
            }
        }
        $newdata = $newdata."DE";
    }
    $fp = fopen("swami.txt","wb");
    fwrite($fp,$newdata);
    fclose($fp);
}
encode();
?>
