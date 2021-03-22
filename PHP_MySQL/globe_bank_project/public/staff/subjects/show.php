<?php

// loading up the functions

require_once '../../../private/initialize.php';

// We can use this thanks to a PHP 7+ COALESCING OPERATOR
$id = $_GET['id'] ?? '1';
echo h($id);
?>

<br>
<a href="show.php?name=<?php echo u('John Doe'); ?>">Link</a> <br />
<a href="show.php?company=<?php echo u('Widgets&More'); ?>">Link</a> <br />
<a href="show.php?query=<?php echo u('!#*?'); ?>">Link</a> <br />