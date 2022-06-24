<?php
    require('config/config.php');
    require('config/db.php');

    // Check if password is correct and is in the database

    require('inc/header.php');


    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        if(password_verify($password, $user['password'])){
            header('Location: '.ROOT_URL.'');
            $_SESSION['user'] = $user['id'];
        } else {
            echo '<div class="centered danger">Incorrect password</div>';
        }
    }

    ?>

    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>