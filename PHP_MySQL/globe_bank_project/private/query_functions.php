<?php
function find_all_subjects()
{
    // we have to tell it to use global $db because it is not being passed in !, it is not in scope
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    return $result;
}