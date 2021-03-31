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

function find_subject_by_id($id)
{
    global $db;
    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // which returns an array
}

function insert_subject($menu_name, $visible, $position)
{
    global $db;
    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible)";
    $sql .= "VALUES ('$menu_name', '$position', '$visible')";

    $result = mysqli_query($db, $sql);
    // INSERT reslt check

    if ($result) {
        return true;
    } else {
        // If it failes
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

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