<?php
require_once "../../../private/initialize.php";
?>

<?php $page_title = "Show page"?>

<?php include SHARED_PATH . '/staff__header.php';?>

<div id="content">
    <div class="page__back">
        <a href="<?php echo url_for('/staff/pages/index.php') ?>"> &laquo; Back to pages</a>
        <br />
        <br />
    </div>

    <div class="page__show">
        <?php
$id = $_GET['id'] ?? '1';
echo "Page ID is: " . h($id);
?>
    </div>


</div>


<?php include SHARED_PATH . '/staff__footer.php';?>