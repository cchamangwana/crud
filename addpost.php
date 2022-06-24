<?php
require('config/config.php');
require('config/db.php');

if(isset($_POST['submit'])){
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    // $author = mysqli_real_escape_string($conn, $_POST['author']);
    $query = "INSERT INTO posts (title, body) VALUES ('$title', '$body')";
    if (mysqli_query($conn, $query)) {
        header('Location: ' . ROOT_URL . '');
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}

?>

<?php
include('inc/header.php');
include('inc/nav.php');

?>

<div class="container">
    <h3>Add Post</h3>
    <form method="POST" action="addpost.php">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
        <input type="submit" name="submit" value="Submit">
    </form>
</div>