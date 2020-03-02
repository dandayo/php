<?php

function sanit($word)
{
    $word = trim($word);
    $word = filter_var($word,FILTER_SANITIZE_STRING);
    return $word;
}

?>