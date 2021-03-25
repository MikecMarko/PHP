<?php require_once "../../../private/initialize.php";

$name = '';
$position = '';
$visible = '';

if (is_post_request()) {
// handling of form values sent by new.php

    $name = $_POST['name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo "Form Parameters <br />";
    echo "Menu name: " . $name . "<br />";
    echo "Position: " . $position . "<br />";
    echo "Visible: " . $visible . "<br />";
}
?>

<?php $page_title = "Create a page";?>
<?php include SHARED_PATH . '/staff__header.php';?>

<div id="content">

    <div class="content__back">
        <a class="content__page__back" href="<?php echo url_for('/staff/pages/index.php') ?>">&laquo; Back to pages</a>
    </div>
    <div class="content__page__new">
        <h1>Create a new page</h1>
        <form action="<?php echo url_for('/staff/pages/new.php') ?>" method="post">
            <dl>
                <dt>Page Name</dt>
                <dd><input type="text" name="name" value="<?php echo h($name); ?>"></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <option value="1" <?php if ($position == "1") {echo "selected";}?>>1</option>

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
                <input type="submit" value="Create Page">
            </div>


        </form>


    </div>
</div>
<?php include SHARED_PATH . '/staff__footer.php'?>