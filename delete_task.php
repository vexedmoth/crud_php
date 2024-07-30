<?php

include("db/db.php");



if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "DELETE FROM tasks WHERE id = $id";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error" . mysqli_error($connection));
    }


    $_SESSION["message"] = "Task removed successfully";
    $_SESSION["message_type"] = "danger";

    header("Location: dashboard.php");
    exit;



}

?>