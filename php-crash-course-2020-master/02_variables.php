<?php

// What is a variable

// Variable types
/*
String Integeer Float Boolean Null Array Object Resource
*/
// Declare variables
$name ="marko";
$age=28;
$bool=false;
$height=23.5;
$salary=null;

// Print the variables. Explain what is concatenation
echo $name."<br>";
echo $age."<br>";
echo $bool."<br>";
echo $height."<br>";
echo $salary."<br>";

// Print types of the variables
echo gettype($name)."<br>";
echo gettype($age)."<br>";
echo gettype($bool)."<br>";
echo gettype($height)."<br>";
echo gettype($salary)."<br>";
// Print the whole variable
var_dump($name,$age,$salary,$bool,$height);

// Change the value of the variable
$name=false;

// Print type of the variable
echo gettype($name);
// Variable checking functions
is_string($name);
is_int($age);
// Check if variable is defined
isset($age);
isset($name);
// Constants
define("pi", 3.14);
echo "<br>".pi;
// Using PHP built-in constants
