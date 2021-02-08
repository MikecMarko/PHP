<?php

// Create simple string
$name="Marko";
$string='Hello'.$name;
$string2="Hello".$name;
//'' wont write the variable
// ""writes the variable
echo $string;
echo $string2;

// String concatenation
//We use . concatinate

// String functions
$ime="Marko";
strlen($ime); //lenght
trim($ime); //whitespaces
ltrim($ime); //lett side whitespaces
rtrim($ime); //right side whitespaces
str_word_count($ime); //words 
strrev($ime); // reverses string
strtoupper($ime); // all to upper
strtolower($ime); //all to lower
ucfirst($ime); // first to upper
lcfirst($ime); //first to lower
//ucwords ==> uppercase to first letter f each word
//strpos ==>  searches for a word or variable in string
//stripos ==>
substr($ime,2 ); //  shows only from 2. position
//str_replace ==> replaces two words (word1, word2, string name)
//str_ireplace ==> ignores the upper and lower letter letters and does the replacement.

// Multiline text and line breaks
//we use function nl2br == replaces the whitespace and addes br tags to show like we want it


// Multiline text and reserve html tags
//nl2br + htmlentities  ==> ignores the html in string



// https://www.php.net/manual/en/ref.strings.php