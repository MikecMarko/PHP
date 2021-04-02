<?php

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];



// when the form is submitted and it is a POST request do the following

if (is_post_request()) {
    delete_subject($id);
    redirect_to(url_for('/staff/subjects/index.php'));
} else {
    $subject = find_subject_by_id($id);
}

?>


<?php $page_title = "Delete Subject"; ?>
<?php include SHARED_PATH . '/staff__header.php'; ?>

<div id="content">

    <a href="<?php echo url_for('/staff/subjects/index.php'); ?>" class="page__back">&laquo; Back to subjects</a>

    <div class="page__subject_delete">
        <h1>Delete a subject</h1>

        <p>Are you sure you want to delete this subject? </p>

        <p class="page__item"> <?php echo h($subject['menu_name']); ?> </p>

        <form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Subject">

            </div>
        </form>

    </div>

</div>

<?php include SHARED_PATH . '/staff__footer.php' ?>