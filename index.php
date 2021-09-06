<?php

use Libiary\Post;

require './includes/header.php'; ?>

<?php
if (isset($_GET['delete'])) {
    $id  = $_GET['id'];
    $post = new Post();
    $post->delete($id);
}
$category = Post::all("select * from categories order by id desc");

?>
<div class="card">
    <div class="card-header">Heading</div>
    <div class="card-body">
        <a href="create.php" class="btn btn-sm btn-danger">Create</a>
        <hr>

        <table class="table table-striped">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Option</td>
            </tr>
            <?php
            $i = 1;
            foreach ($category as $d) {
            ?>
                <tr>
                    <td><?php echo $i;
                        $i++; ?></td>
                    <td><?php echo $d->name; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $d->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="index.php?delete=true&id=<?php echo $d->id; ?>" onclick="return confirm('Sure?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }

            ?>

        </table>
    </div>
</div>
<?php require './includes/footer.php'; ?>