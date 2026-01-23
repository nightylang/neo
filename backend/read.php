<!-- PHP8 -->
<?php
    require_once "config.php";

    session_start();
        if (!isset($_SESSION["loggedin"], $_SESSION['user_id']) || $_SESSION["loggedin"] !== true) {
        header("location: index.php");
        exit;
    }

    $user_id = $_SESSION['user_id'];

?>

<!-- HTML5 -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEO Store</title>
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
                <h1>NEO Store</h1>
            </div>
             <div class="acc-ad">
                <div class="name-user"><?php $sqlW = "SELECT username FROM users WHERE user_id=$user_id";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {echo $row['username'];}}?>'s</div>
                <a href="./profile.php">
                    <?php $sqlUs = "SELECT * FROM users WHERE user_id = $user_id";
                        $result = mysqli_query($link, $sqlUs);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<img src="'.$row['imageuser'].'">';
                            }
                        } else {
                            echo '<img src="https://www.pngkey.com/png/detail/202-2024792_user-profile-icon-png-download-fa-user-circle.png">';
                        }
                    ?>
                </a>
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
                                <li class="Active">Data user</li>
                            </a>
                            <a href="#">
                                <li>Course</li>
                            </a>
                            <a href="./products.php">
                                <li>Product</li>
                            </a>
                            <a href="./search-form.php">
                                <li>Search</li>
                            </a>
                            <a href="./logout.php">
                                <li>Logout Acc</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- main -->
            <main>
                <?php
                    if(isset($_GET["cus_id"]) && !empty(trim($_GET["cus_id"]))){

                        $sqlCu = "SELECT * FROM customer WHERE cus_id = ?";

                        if($stmt = mysqli_prepare($link, $sqlCu)){
                            mysqli_stmt_bind_param($stmt, "i", $param_id);

                            $param_id = trim($_GET["cus_id"]);

                            if(mysqli_stmt_execute($stmt)){

                                $result = mysqli_stmt_get_result($stmt);

                                if(mysqli_num_rows($result) == 1){
                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                                    $name = $row["name"];
                                    $gender = $row["gender"];
                                    $dob = $row["dob"];
                                    $email = $row["email"];
                                    $phone = $row["phone"];
                                    $address = $row["address"];
                                    $salary = $row["salary"];
                                    $image = $row["image"];
                                }else{
                                    header("location: error.php");
                                    exit();
                                }
                            }else{
                                echo "Oop! Something went wrong. Please try again later.";
                            }
                        }
                        mysqli_stmt_close($stmt);
                    mysqli_close($link);

                    }else{
                        header("location: error.php");
                        exit();
                    }
                ?>
                <div class="wrapper">
                    <div class="controll">
                        <div class="row">
                            <h2>View Record</h2>
                            <div class="col">
                                <div class="form-group">
                                    <label>Name</label>
                                    <p><b><?php echo $row["name"]; ?></b></p>
                                </div>

                                <h1></h1>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <p><b><?php echo $row["gender"]; ?></b></p>
                                </div>

                                <h1></h1>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <p><b><?php echo $row["dob"]; ?></b></p>
                                </div>

                                <h1></h1>
                                <div class="form-group">
                                    <label>Email</label>
                                    <p><b><?php echo $row["email"]; ?></b></p>
                                </div>

                                <h1></h1>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <p><b><?php echo $row["phone"]; ?></b></p>
                                </div>

                                <h1></h1>
                                <div class="form-group">
                                    <label>Address</label>
                                    <p><b><?php echo $row["address"]; ?></b></p>
                                </div>

                                <h1></h1>
                                <div class="form-group">
                                    <label>Salary</label>
                                    <p><b><?php echo $row["salary"]; ?></b></p>
                                </div>

                                <h1></h1>
                                <div class="form-group">
                                    <label>Image</label>
                                    <p><b><img src="<?php echo $row["image"]; ?>"></b></p>
                                </div>

                            </div>
                            <p><a class="btn-exit" href="datauser.php">Back</a></p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </mainp>
    <!-- Footer -->
    <footer></footer>

</body>

</html>