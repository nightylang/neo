<!-- PHP8 -->
<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){

    require_once "config.php";

    $sql = "DELETE FROM users_tb WHERE id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_POST["id"]);

        if(mysqli_stmt_execute($stmt)){
            header("location: datauser.php");
            exit();
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else{
    if(empty(trim($_GET["id"]))){
        header("location: error.php");
        exit();
    }
}
?>

<!-- HTML5 -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard PHP CUS</title>
    <script src="https://kit.fontawesome.com/7befde15db.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <link rel="icon" href="">
    <link rel="stylesheet" href="src/css/dashboard.min.css">
    <link rel="stylesheet" href="src/css/table.min.css">
    <link rel="stylesheet" href="src/css/button.min.css">
    <link rel="stylesheet" href="src/css/main.min.css">
</head>

<body>
    <headerTop>
        <div class="wrapper-header">
            <div class="controll">
                <img
                    src="https://png.pngtree.com/png-clipart/20231108/original/pngtree-tiger-head-logo-design-png-image_13517862.png">
                <h1>CUS Student</h1>
            </div>
            <div class="acc-ad">
                <div class="name-user">Admin's</div>
                <img
                    src="https://preview.redd.it/10reysxkw6881.jpg?auto=webp&s=661e5ee0ac56ba2a120becae65352191b6617644">
            </div>
        </div>
    </headerTop>
    <mainp class="mainbodyp">
        <div class="Body">
            <!-- Header -->
            <header>
                <div class="navbar">
                    <div class="options">
                        <ul>
                            <a href="index.php">
                                <li>Dashboard</li>
                            </a>
                            <a href="datauser.php">
                                <li class="active">Data user</li>
                            </a>
                            <a href="#">
                                <li>Course</li>
                            </a>
                            <a href="#">
                                <li>Product</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- main -->
            <main>
                <div class="wrapper">
                    <h2>Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="flexColumn">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>">
                            <p>Are you sure you want to delete this ID :<?php echo trim($_GET["id"]); ?> from users_tb
                                record?</p>
                            <p>
                                <input for="flexColum" type="submit" value="Yes" id="btn-yes">
                                <a href="datauser.php" class="btn-cancel">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </mainp>
    <!-- Footer -->
    <footer></footer>

</body>

</html>