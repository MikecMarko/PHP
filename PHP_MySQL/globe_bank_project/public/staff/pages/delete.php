<?php

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];



// when the form is submitted and it is a POST request do the following

if (is_post_request()) {
    $result = delete_page($id);
    redirect_to(url_for('/staff/pages/index.php'));
} else {
    $page = find_page_by_id($id);
}

?>


<?php $page_title = "Delete Subject"; ?>
<?php include SHARED_PATH . '/staff__header.php'; ?>

<div id="content">

    <a href="<?php echo url_for('/staff/pages/index.php'); ?>" class="page__back">&laquo; Back to pages</a>

    <div class="page__subject_delete">
        <h1>Delete a page</h1>

        <p>Are you sure you want to delete this page? </p>

        <p class="page__item"> <?php echo h($page['menu_name']); ?> </p>

        <form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Page">

            </div>
        </form>

    </div>

</div>

<?php include SHARED_PATH . '/staff__footer.php' ?>