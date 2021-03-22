<?php
require_once "../../../private/initialize.php";
?>

<?php include SHARED_PATH . '/staff__header.php';?>
<div id="content">
    <a href="index.php">Back to pages</a>
    <br />
    <br />
    <?php
$id = $_GET['id'] ?? '1';
echo "Page ID is: " . $id;
?>
</div>


<?php include SHARED_PATH . '/staff__footer.php';?>