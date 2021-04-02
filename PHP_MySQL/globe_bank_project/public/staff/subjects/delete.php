<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'))
}

$id= $_GET['id'];

$subject = find_subject_by_id($id);

if(is_post_request()){
    
}

?>


<?php $page_title = "Delete Subject"; ?>