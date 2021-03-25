<?php require_once "../../../private/initialize.php";
$test = $_GET['test'] ?? '';
if ($test == '404') {
    error_404();
} elseif ($test == '500') {
    error_500();
} elseif ($test == 'redirect') {
    redirect_to(url_for('/staff/subjects/index'));
    exit();
}
?>

<?php $page_title = "Create a page";?>
<?php include SHARED_PATH . '/staff__header.php';?>

<div id="content">

    <div class="content__back">
        <a class="content__page__back" href="<?php echo url_for('/staff/subjects/index.php') ?>"></a>
    </div>
    <div class="content__page__new">
        <h1>Create a new page</h1>
        <form action="<?php echo url_for('/staff/pages/create.php') ?>">
            <dl>
                <dt>Page Name</dt>
                <dd><input type="text" name="menu_name" value=""></dd>
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
                <input type="submit" value="Create Page">
            </div>


        </form>


    </div>
</div>
<?php include SHARED_PATH . '/staff__footer.php'?>