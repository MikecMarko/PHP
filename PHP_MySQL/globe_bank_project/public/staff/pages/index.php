<?php
require_once "../../../private/initialize.php";
?>

<?php

$page_set = find_all_pages();
?>
<?php
$page_title = 'Pages';
?>

<?php include SHARED_PATH . '/staff__header.php'; ?>

<div id="content">
    <div class="pages__listing">
        <h1>Pages</h1>
        <div class="action">
            <a class="action" href="<?php echo url_for('/staff/pages/new.php'); ?>">Create a new page</a>
        </div>
        <br>
        <table class="list">
            <tr>
                <th>Id</th>
                <th>Subject Id</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <?php while ($page = mysqli_fetch_assoc($page_set)) { ?>
                <?php $subject = find_subject_by_id($page['subject_id']); ?>
                <td> <?php echo h($page['id']) ?> </td>
                <td><?php echo h($subject['menu_name']); ?></td>
                <td> <?php echo h($page['position']) ?> </td>
                <td> <?php echo $page['visible'] == 1 ? 'true' : 'false' ?> </td>
                <td> <?php echo h($page['menu_name']) ?> </td>
                <td> <a class="action"
                        href="<?php echo url_for("/staff/pages/show.php?id=" . h(u($page['id']))) ?>">View</a>
                </td>
                <td> <a href="<?php echo url_for("/staff/pages/edit.php?id=" . h(u($page['id']))) ?>">Edit</a> </td>
                <td> <a href="<?php echo url_for("/staff/pages/delete.php?id=" . h(u($page['id']))) ?>">Delete</a> </td>
            </tr>
            <?php } ?>
        </table>
        <?php mysqli_free_result($page_set) ?>
    </div>
</div>
<?php include SHARED_PATH . '/staff__footer.php'; ?>