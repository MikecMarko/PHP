<?php
require_once '../../../private/initialize.php';

if (is_post_request()) {
// handling of form values sent by new.php

    $name = $_POST['name'] ?? '';
    $position = $_POST['position'] ?? '';
    $visible = $_POST['visible'] ?? '';

    echo "Form Parameters <br />";
    echo "Menu name: " . $name . "<br />";
    echo "Position: " . $position . "<br />";
    echo "Visible: " . $visible . "<br />";
} else {
    redirect_to(url_for('/staff/pages/new.php'));
}