<?php


include("db/db.php");

function get_password_hash($username)
{
    global $connection;

    $query = "SELECT password_hash FROM users WHERE username = '$username'";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        //Si encuentra al usuario
        $row = mysqli_fetch_assoc($result);
        $stored_hash = $row["password_hash"];
        return $stored_hash;
    } else {
        //Si no lo encuentra
        return null;
    }
}

function get_id($username)
{
    global $connection;

    $query = "SELECT id FROM users WHERE username = '$username'";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        //Si encuentra al usuario
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        return $id;
    } else {
        //Si no lo encuentra
        return null;
    }
}

if (isset($_POST["login_auth"])) {
    $username = $_POST['input_username'];
    $password = $_POST['input_password'];

    $stored_hash = get_password_hash($username);

    //Si coincide
    if ($stored_hash !== null && password_verify($password, $stored_hash)) {
        $_SESSION["user_id"] = get_id($username);
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION["message"] = "Incorrect username or password. Try again";
        $_SESSION["message_type"] = "danger";
        header("Location: index.php");
        exit;
    }
}



?>