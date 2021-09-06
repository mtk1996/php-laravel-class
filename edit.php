<?php

use Libiary\Post;

require './includes/header.php'; ?>

<?php
if (!isset($_GET['id'])) {
    header("Location:index.php");
} else {
    $id = $_GET['id'];
    $post = new Post();
    $data  = $post->show($id);
}

if (isset($_POST['name'])) {
    $post = new Post();
    if ($post->update($_POST)) {
        header("Location:edit.php?id=" . $_GET['id']);
    }
}

?>
<div class="card">
    <div class="card-header">Heading</div>
    <div class="card-body">
        <a href="index.php" class="btn btn-sm btn-dark">Back</a>
        <hr>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
            <div class="form-group">
                <label for="">Enter Name</label>
                <input value="<?php echo $data->name; ?>" class="form-control" type="text" name="name">
            </div>
            <input type="submit" class="btn btn-sm btn-success">
        </form>
    </div>
</div>
<?php require './includes/footer.php'; ?>