<?php

include("db/db.php");

if (isset($_POST["save_task"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $user_id = $_SESSION["user_id"];

    $query = "INSERT INTO tasks(title, description, user_id) VALUES ('$title', '$description', '$user_id')";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error" . mysqli_error($connection));
    }


    //Guardamos en la sesion dos mensajes
    $_SESSION["message"] = "Task saved successfully";
    $_SESSION["message_type"] = "success";

    header("Location: dashboard.php");
    exit;

}

?>