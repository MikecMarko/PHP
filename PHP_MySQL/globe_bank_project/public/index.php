<?php require_once('../private/initialize.php'); ?>

<?php 
    if(isset($_GET['id'])) {
        $page_id = $_GET['id'];
        $page = find_page_by_id($page_id);
        if(!$page) {
            redirect_to(url_for('/index.php'));
        }
        $subject_id = $page['subject_id'];
    } else {
        // Nothing selected shows on page
    }

?>

<?php include(SHARED_PATH . '/public__header.php'); ?>

<div id="main">

    <?php include(SHARED_PATH . '/public__navigation.php'); ?>
    <div id="page">
        <?php
        if(isset($page)) {
            // TODO add html escaping back
            echo $page['content'];
        } else {
            //
        }
        //Show the homepage
        //The homepage content should be static content, show the first page from the nav
        //be in the database but add code to hide in the nav.
         include(SHARED_PATH . '/static_homepage.php'); 
         ?>
    </div>
</div>

<?php include(SHARED_PATH . '/public__footer.php'); ?>