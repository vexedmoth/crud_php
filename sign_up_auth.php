<?php

include("db/db.php");


if (isset($_POST["sign_up_auth"])) {
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users(username, password_hash) VALUES ('$new_username', '$hashed_password')";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        $_SESSION["message"] = "Error in registration";
        $_SESSION["message_type"] = "danger";
    }

    $_SESSION["message"] = "You have been registered!";
    $_SESSION["message_type"] = "success";

    header("Location: sign_up.php");
    exit;


}



?>