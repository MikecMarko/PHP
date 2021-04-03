<?php require_once "../../../private/initialize.php";

$name = '';
$position = '';
$visible = '';

if (is_post_request()) {
    // handling of form values sent by new.php

    $page = [];
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['name'] = $_POST['name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';

    $result = insert_page($page);

    $new_id = mysqli_insert_id($db);

    redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));
} else {
    $page = [];
    $page['subject_id'] = '';
    $page['name'] = '';
    $page['position'] = '';
    $page['visible'] = '';
    $page['content'] = '';

    $page_set = find_all_pages();
    $page_count = mysqli_num_rows($page_set) + 1;
    mysqli_free_result($page_set);
}
?>

<?php $page_title = "Create a page"; ?>
<?php include SHARED_PATH . '/staff__header.php'; ?>

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
                        <option value="1" <?php if ($position == "1") {
                                                echo "selected";
                                            } ?>>1</option>

                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1" <?php if ($visible == "1") {
                                                                        echo "checked";
                                                                    } ?> />
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Page">
            </div>


        </form>


    </div>
</div>
<?php include SHARED_PATH . '/staff__footer.php' ?>