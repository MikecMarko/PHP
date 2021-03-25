<?php require_once "../../../private/initialize.php";

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];
$menu_name = '';
$position = '';
$visible = '';

if (is_post_request()) {
    // handling of form values sent by new.php

    $menu_name = $_POST['menu_name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo "Form Parameters <br />";
    echo "Menu name: " . $menu_name . "<br />";
    echo "Position: " . $position . "<br />";
    echo "Visible: " . $visible . "<br />";
}
?>

<?php $page_title = 'Edit Subject';?>
<?php include SHARED_PATH . '/staff__header.php';?>

<div id="content">

    <a class="page__back" href="<?php echo url_for('staff/subjects/index.php') ?>">&laquo; Back to Subjects</a>
    <div class="subject__edit">
        <h1>Edit a subject</h1>
        <form action="<?php echo url_for('staff/subjects/edit.php?id=' . h(u($id))) ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value="<?php echo $menu_name ?>"></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position" id="">
                        <option value="<?php echo $position; ?>">1</option>

                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1" />
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject">
            </div>

        </form>
    </div>

</div>

<?php include SHARED_PATH . '/staff__footer.php'?>