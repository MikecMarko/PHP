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
    <div class="subject__show">
        <?php

// We can use this thanks to a PHP 7+ COALESCING OPERATOR

$id = $_GET['id'] ?? '1';

$sql = "SELECT * FROM subjects ";
$sql .= "WHERE id='" . $id . "'";
$result = mysqli_query($db, $sql);
confirm_result_set($result);

$subject = mysqli_fetch_assoc($result);
mysqli_free_result($result);
?>
        <!-- Showing result -->
        <h1>Subject: <?php echo h($subject['menu_name']); ?></h1>
        <div class="subject__atributes">
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo h($subject['menu_name']); ?> </dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($subject['position']); ?> </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo h($subject['visible']); ?> </dd>
            </dl>
        </div>
    </div>
</div>


<?php include SHARED_PATH . '/staff__footer.php'?>