<?php require_once "../../private/initialize.php";?>
<?php $page_title = "Staff menu";?>
<?php include SHARED_PATH . "/staff__header.php";?>


<div id="content">
    <h1>Main menu</h1>
    <div class="" id="main__menu">
        <ul>
            <li><a href="<?php echo url_for('/staff/subjects/index.php') ?>">Subjects</a></li>
            <li><a href="<?php echo url_for('/staff/pages/index.php') ?>">Pages</a></li>
            <li><a href="<?php echo url_for('/staff/admins/index.php') ?>">Admins</a></li>
        </ul>
    </div>
</div>

<?php include SHARED_PATH . "/staff__footer.php";?>