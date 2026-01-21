<?php
require_once "config.php";
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: error.php");
    exit;
}

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT user_id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if ($hashed_password !== null && password_verify($password, $hashed_password)) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $id;
                            $_SESSION["username"] = $username;

                            header("location: dasboard.php");
                        } else {
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEO Store - Login</title>
    <link rel="stylesheet" href="src/css/styleSignup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h1>Login Account NEO</h1>
            <div class="input-box">
                <div class="top">
                    <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
                </div>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="input-box">
                <div class="top">
                    <input type="password" name="password" placeholder="Password" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <i class='bx bxs-lock-alt'></i>
                </div>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="clasdBtn">
                <input class="btn" type="submit" value="Login" >
            </div>
            <!-- <button type="submit" value="submit" class="btn">Register</button> -->
            <div class="register-link">
                <p>Don't have an account? <a href="./register.php">sign up</a></p>
            </div>
        </form>
    </div>
</body>


</html>