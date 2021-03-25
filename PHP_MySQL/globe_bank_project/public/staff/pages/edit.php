<?php require_once '../../../private/initialize.php'?>
<?php

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];
$name = '';
$position = '';
$visible = '';

if (is_post_request()) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $visible = $_POST['visible'];

    echo "Form Parameters  " . "<br />";
    echo "Page name: " . $name . "<br />";
    echo "Page position: " . $position . "<br />";
    echo "Page visibility: " . $visible . "<br />";
}
$page_title = "Edit the page";
include SHARED_PATH . '/staff__header.php';
?>
<div id="content">
    <div class="content__back">
        <a class="content__page__back" href="<?php echo url_for('/staff/pages/index.php') ?>">&laquo; Back to
            pages</a>
    </div>
    <div class="content__page__new">
        <h1>Edit a page</h1>
        <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))) ?>" method="post">
            <dl>
                <dt>Page Name</dt>
                <dd><input type="text" name="name" value=""></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position" id="">
                        <option value="1">1</option>

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
                <input type="submit" value="Edit Page">
            </div>


        </form>


    </div>


</div>


<?php include SHARED_PATH . '/staff__footer.php';?>