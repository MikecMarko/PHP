<?php
function find_all_subjects()
{
    // we have to tell it to use global $db because it is not being passed in !, it is not in scope
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_all_pages()
{
    // we have to tell it to use global $db because it is not being passed in !, it is not in scope
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}