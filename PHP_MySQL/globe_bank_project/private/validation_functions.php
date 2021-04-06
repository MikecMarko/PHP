<?php

/* 
is_blank ('abcd') validates the data presence
it uses trim() to not count empty spaces
it uses === to avoid false positives.

It is better than empty() because empty() considers "0" to be empty
*/

function is_blank()
{
    return !isset($value) || trim($value) === '';
}