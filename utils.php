<?php

 function sanitize_unsafe($value) {
     $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
     $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
     return str_replace($search, $replace, $value);
 }

function fromPost($var){
    if (isset($_POST[$var]))
      return sanitize_unsafe($_POST[$var]);
}

function fromGet($var){
   if (isset($_GET[$var]))
      return sanitize_unsafe($_GET[$var]);
}

?>
