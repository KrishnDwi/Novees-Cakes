<?php
session_start();
require_once 'process_admin.php';
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
    <div class="form-body">
        <div class="form-container-login">
            <div class="header">
                <h1>Login || Admin</h1>
            </div>
            <div class="content">
                <form method="POST">
                    <div class="form-element">
                        <label for="username">Username</label>
                        <input type="text" name="username" >
                    </div>
                    <div class="form-element">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="password">
                    </div>
                    <div class="form-element">
                        <?php if (isset($error)): ?>
                        <p>
                            <?php echo $error; ?>
                        </p>
                        <?php endif; ?>
                        <input type="submit" name="submit_login_admin" value="Login">
                        </div>
                    </form>
                </div>
        </div>
    </div>


</body>

</html>