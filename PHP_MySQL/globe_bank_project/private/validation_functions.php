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


/*
has_preservance('abcd') validates the data presence
it is reverse of is_blank.

has is a preference for data validation.
*/

function has_presence($value)
{
    return !is_blank($value);
}


/* 
  has_length_greater_than('abcd', 3) validates the string lenght
  spaces count towards lenght. we use trim() if spaces should not count
*/

function has_lenght_greater_than($value, $min)
{
    $lenght = strlen($value);
    return $lenght > $min;
}