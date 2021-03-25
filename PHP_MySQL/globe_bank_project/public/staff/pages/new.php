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