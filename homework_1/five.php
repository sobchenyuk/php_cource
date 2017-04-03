<?php

$arrPart = [
    'header',
    'content',
    'footer'
];

$arrCase = ['parts'];

for($i = 0; $i < count($arrPart); $i++)
{
    echo '/'.$arrCase[0].'/'.$arrPart[$i].'.php <br />';
}