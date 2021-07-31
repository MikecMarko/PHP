<?php
require_once "../../../private/initialize.php";
?>

<?php

$id = $_GET['id'] ?? '1';

$page = find_page_by_id($id);

?>

<?php $page_title = "Show page" ?>

<?php include SHARED_PATH . '/staff__header.php'; ?>

<div id="content">
    <div class="page__back">
        <a href="<?php echo url_for('/staff/pages/index.php') ?>"> &laquo; Back to pages</a>
        <br />
        <br />
    </div>

    <div class="page__show">
        <h1>Page : <?php echo h($page['menu_name']) ?></h1>
        <div class="page__atributes">
            <?php $subject = find_subject_by_id($page['subject_id']); ?>
            <dl>
                <dt>Subject</dt>
                <dd><?php echo h($subject['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Menu Name </dt>
                <dd><?php echo h($page['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($page['position']); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo h($page['visible'] == '1' ? 'true' : 'false'); ?></dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd><?php echo h($page['content']); ?></dd>
            </dl>

        </div>
    </div>

    <br />
</div>


<?php include SHARED_PATH . '/staff__footer.php'; ?>