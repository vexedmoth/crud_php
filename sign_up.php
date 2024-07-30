<?php include("db/db.php") ?>


<?php include("includes/header.php") ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Sign Up</h2>
    <?php if (isset($_SESSION["message"])) { ?>
        <div class="alert alert-<?= $_SESSION["message_type"] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION["message"] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION["message"]);
    } ?>
    <form action="sign_up_auth.php" method="post" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="new_username" class="form-label">New Username</label>
            <input type="text" id="new_username" name="new_username" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success d-block mx-auto" name="sign_up_auth">Sign Up</button>
    </form>
    <p class="text-center mt-3">
        <a href="index.php">Log In</a>
    </p>
</div>

<?php include("includes/footer.php") ?>