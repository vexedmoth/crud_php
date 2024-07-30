<?php include("db/db.php") ?>


<?php include("includes/header.php") ?>


<div class="container mt-5">
    <h2 class="mb-4 text-center">Log In</h2>
    <?php if (isset($_SESSION["message"])) { ?>
        <div class="alert alert-<?= $_SESSION["message_type"] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION["message"] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION["message"]);
    } ?>
    <form action="login_auth.php" method="post" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="input_username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="input_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary d-block mx-auto" name="login_auth">Log In</button>
    </form>

    <p class="text-center mt-3">
        <a href="sign_up.php">Sign Up</a>
    </p>

</div>

<?php include("includes/footer.php") ?>