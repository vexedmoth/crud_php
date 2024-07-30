<?php

include("db/db.php");


//Validación al pulsar click en boton editar. obtiene el id, el titulo y la descripcion actual.
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT * FROM tasks WHERE id = $id";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($result);
    $title = $row["title"];
    $description = $row["description"];
}

//Validacion formulario de abajo. Actualiza tarea nueva escrita en el formulario
if (isset($_POST["update"])) {

    $new_title = $_POST["title"];
    $new_description = $_POST["description"];

    $query = "UPDATE tasks set title = '$new_title', description = '$new_description' WHERE id = $id";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query error" . mysqli_error($connection));
    }

    $_SESSION["message"] = "Task updated successfully";
    $_SESSION["message_type"] = "warning";

    header("Location: dashboard.php");

}

?>


<?php include("includes/header.php") ?>



<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" value="<?= $title ?>"
                            placeholder="Update Title">
                    </div>

                    <div class="mb-3">
                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Update description"><?= $description ?></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success" name="update">Update</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>