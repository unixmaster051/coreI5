<?php

echo 'szerintem ez egy php kód...';


echo '<br> ';

$site = file_get_contents('./ksanyi_nnet.html');
function makeClickableLinks($site) {
    return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $s);
}


/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015.11.05.
 * Time: 16:43
 */

echo makeClickableLinks($site);
?>