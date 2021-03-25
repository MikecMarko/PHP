<?php
// handling of form values sent by new.php

$menu_name = $_POST['menu_name'] ?? '';
$position = $_POST['position'] ?? '';
$visible = $_POST['visible'] ?? '';

echo "Form Parameters <br />";
echo "Menu name: " . $menu_name . "<br />";
echo "Position: " . $menu_name . "<br />";
echo "Visible: " . $menu_name . "<br />";