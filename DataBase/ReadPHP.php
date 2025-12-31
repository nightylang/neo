<!-- PHP8 -->
<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "config.php";

    $sql = "SELECT * FROM users_tb WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_GET["id"]);

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