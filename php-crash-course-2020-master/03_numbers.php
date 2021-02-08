<?php

// Declaring numbers
$a=5;
$b=3;
$c=1.2;
// Arithmetic operations
echo $a + $b *$c;
//multiplication has priority like in general math rules
// Assignment with math operators
$a = $a+$b;
$a+=$b;
echo $a;
// We can use it with any operator.
// Increment operator
$a++; //printed out then added
++$a; //added then printed.

// Decrement operators
$a--;
--$a;
//same rules

// Number checking functions
is_double(1.25);
is_integer(1);
is_float(2);
is_numeric("3.45");
// Conversion
$strnumber="12.35";
$number=(float)$strnumber; //or (floatval, int, intval)
var_dump($number);

// Number functions
abs(-15); //apsolute number of function -15 == 15
pow(2,3); //expoentinal 2 on 3
sqrt(14); //square
// min and max returns logical
round(2.3); // circle up
floor(2.6); //roundup lower
ceil(2.3); //roundup higher
 
// Formatting numbers
$number= 1232132214.12;
number_format($number, 2, ',', '');

// https://www.php.net/manual/en/ref.math.php
// there are a lot more of those functions
