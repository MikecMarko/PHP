<?php
require_once "../../../private/initialize.php";
?>

<?php
$pages = [
    ['id' => '1', 'position' => '1', 'visible' => 1, 'name' => 'Page no. 1'],
    ['id' => '2', 'position' => '2', 'visible' => 1, 'name' => 'Page no. 2'],
    ['id' => '3', 'position' => '3', 'visible' => 0, 'name' => 'Page no. 3'],
    ['id' => '4', 'position' => '4', 'visible' => 1, 'name' => 'Page no. 4'],
]
?>
<?php
$page_title = 'Pages';
?>

<?php include SHARED_PATH . '/staff__header.php';?>

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
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <?php foreach ($pages as $page) {?>
                <td> <?php echo h($page['id']) ?> </td>
                <td> <?php echo h($page['position']) ?> </td>
                <td> <?php echo $page['visible'] == 1 ? 'true' : 'false' ?> </td>
                <td> <?php echo h($page['name']) ?> </td>
                <td> <a class="action"
                        href="<?php echo url_for("/staff/pages/show.php?id=" . h(u($page['id']))) ?>">View</a>
                </td>
                <td> <a href="<?php echo url_for("/staff/pages/edit.php?id=" . h(u($page['id']))) ?>">Edit</a> </td>
                <td> <a href="">Delete</a> </td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
<?php include SHARED_PATH . '/staff__footer.php';?>