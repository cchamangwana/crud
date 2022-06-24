<?php
    session_start();
    require('config/config.php');
    require('config/db.php');

if(isset($_POST['submit'])){
    // Get form data
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$fname', '$lname', '$email', '$hashed_password')";
    if (mysqli_query($conn, $query)) {
        header('Location: ' . ROOT_URL . 'login.php');
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}
?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <h1>Register</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <!-- <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div> -->
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
