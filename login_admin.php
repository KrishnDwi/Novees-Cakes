<?php
session_start();

require_once 'Admin.php';

$admin = new Admin($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_login_admin'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Check if the user exists
        $authenticated_admin = $admin->authenticateAdmin($username, $password);
        if ($authenticated_admin) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $authenticated_admin['username'];
            setcookie('username', $authenticated_admin['username'], time() + 3600);
            header("Location: admin/index.php");
            exit();
        } else {
            // Login failed
            $error = "Your username/password combination was incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Novee's Cakes</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="login">
        <div class="container">
            <h1>Login || Admin</h1>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <?php if (isset($error)): ?>
                    <p>
                        <?php echo $error; ?>
                    </p>
                <?php endif; ?>
                <input type="submit" name="submit_login_admin" value="Login">
            </form>
            <p>Buat akun <a href="register.php">Sign up</a></p>
        </div>
    </div>


</body>

</html>