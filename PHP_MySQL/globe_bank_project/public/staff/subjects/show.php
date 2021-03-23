<?php

// loading up the functions

require_once '../../../private/initialize.php';

?>

<?php $page_title = "Show Subjects"?>

<?php include SHARED_PATH . '/staff__header.php'?>


<div id="content">

    <div class="page__back">
        <a href="<?php echo url_for('/staff/subjects/index.php') ?>"> Back to all subjects</a>
    </div>

    <?php
// We can use this thanks to a PHP 7+ COALESCING OPERATOR
$id = $_GET['id'] ?? '1';
echo "Subject Number is: " . h($id);
?>

</div>


<?php include SHARED_PATH . '/staff__footer.php'?>