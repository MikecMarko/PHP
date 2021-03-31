<?php require_once "../../../private/initialize.php";?>


<?php

$sql = "SELECT * FROM subjects ";
$sql .= "ORDER BY position ASC";
$subject_set = find_all_subjects();

?>

<?php $page_title = "Subjects menu";?>
<?php include SHARED_PATH . "/staff__header.php";?>

<div id="content">
    <div class="subject__listing">
        <h1> Subjects </h1>
        <div class="actions">
            <a class="action" href="<?php echo url_for('staff/subjects/new.php') ?>">Create new subject</a>
        </div>
        <table class="list">
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>


            <?php while ($subject = mysqli_fetch_assoc($subject_set)) {?>
            <tr>
                <td> <?php echo h($subject['id']); ?> </td>
                <td> <?php echo h($subject['position']); ?> </td>
                <td> <?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?> </td>
                <td> <?php echo h($subject['menu_name']); ?> </td>
                <td><a class="action"
                        href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))) ?>">View</a>
                </td>
                <td><a class="action"
                        href="<?php echo url_for('staff/subjects/edit.php?id=' . h(u($subject['id']))) ?>">Edit</a></td>
                <td><a class="action" href="">Delete</a></td>

            </tr>
            <?php }?>

        </table>
        <?php mysqli_free_result($subject_set)?>
    </div>
</div>

<?php include SHARED_PATH . "/staff__footer.php";?>