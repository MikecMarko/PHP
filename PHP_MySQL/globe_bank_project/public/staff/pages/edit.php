<?php require_once '../../../private/initialize.php'?>
<?php

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];
$name = '';
$position = '';
$visible = '';

if (is_post_request()) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $visible = $_POST['visible'];

    echo "Form parameters are as follow: ";
    echo "Page name: " . $name;
    echo "Page position: " . $position;
    echo "Page visibility: " . $visible;
}
$page_title = "Edit the page";
include SHARED_PATH . '/staff__header.php';
?>
<div id="content">



</div>


<?php include SHARED_PATH . '/staff__footer.php';?>