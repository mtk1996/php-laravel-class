<?php

use Libiary\Post;

require './includes/header.php'; ?>

<?php
$success = null;
$error = null;
if (isset($_POST['name'])) {
    $post = new Post();
    if ($post->store($_POST)) {
        $success = true;
    } else {
        $error = true;
    }
}
?>
<div class="card">
    <div class="card-header">Heading</div>
    <div class="card-body">
        <a href="index.php" class="btn btn-sm btn-dark">Back</a>
        <hr>
        <?php
        if ($success) {
            echo ' <div class="alert alert-success">Created!</div>';
        }
        if ($error) {
            echo ' <div class="alert alert-danger">Wrng Something!</div>';
        }
        ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="">Enter Name</label>
                <input class="form-control" type="text" name="name">
            </div>
            <input type="submit" class="btn btn-sm btn-success">
        </form>
    </div>
</div>
<?php require './includes/footer.php'; ?>