<?php require_once '../../../private/initialize.php' ?>
<?php

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id  = $_GET['id'];

if (is_post_request()) {

    $page = [];
    $page['id'] = $id;
    $page['subject_id'] = $_POST['subject_id'] ?? '';
    $page['name'] = $_POST['name'] ?? '';
    $page['position'] = $_POST['position'] ?? '';
    $page['visible'] = $_POST['visible'] ?? '';
    $page['content'] = $_POST['content'] ?? '';

    $result = update_page($page);

    if ($result === true) {
        redirect_to(url_for('/staff/pages/show.php?id=' . $id));
    } else {
        $errors = $result;
    }
} else {
    $page = find_page_by_id($id);
}
$page_set = find_all_pages();
$page_count = mysqli_num_rows($page_set);
mysqli_free_result($page_set);

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
        <?php echo display_errors($errors); ?>
        <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))) ?>" method="post">
            <dl>
                <dt>Subject</dt>
                <dd>
                    <select name="subject_id">
                        <?php
                        $subject_set = find_all_subjects();
                        while ($subject = mysqli_fetch_assoc($subject_set)) {
                            echo "<option value=\"" . h($subject['id']) . "\"";
                            if ($page["subject_id"] == $subject['id']) {
                                echo " selected";
                            }
                            echo ">" . h($subject['menu_name']) . "</option>";
                        }
                        mysqli_free_result($subject_set);
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Page Name</dt>
                <dd><input type="text" name="name" value="<?php echo h($page['name']) ?>"></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <?php
                        for ($i = 1; $i <= $page_count; $i++) {
                            echo "<option value=\"{$i}\"";
                            if ($page['position'] == $i) {
                                echo " selected";
                            }
                            echo ">{$i}</option>";
                        }
                        ?>

                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0" />
                    <input type="checkbox" name="visible" value="1" <?php if ($page['visible'] == "1") {
                                                                        echo "checked";
                                                                    } ?> />
                </dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd>
                    <textarea name="content" id="" cols="60" rows="10"><?php echo h($page['content']) ?></textarea>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Page">
            </div>


        </form>


    </div>


</div>


<?php include SHARED_PATH . '/staff__footer.php'; ?>