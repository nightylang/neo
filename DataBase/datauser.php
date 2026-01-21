<?php
    require_once "config.php";
    session_start();
    if (!isset($_SESSION["loggedin"], $_SESSION['user_id']) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
    }

    $user_id = $_SESSION['user_id'];


$name = $gender = $dob = $email = $phone = $address = $salary = $image = "";
$name_err = $gender_err = $dob_err = $email_err = $phone_err = $address_err = $salary_err = $image_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    //gender
    $input_gender = trim($_POST["gender"]);
    if (empty($input_gender)) {
        $gender_err = "Please enter an gender.";
    } else {
        $gender = $input_gender;
    }

    //dob
    $input_dob = trim($_POST["dob"]);
    if (empty($input_dob)) {
        $dob_err = "Please enter an Date of Birth.";
    } else {
        $dob = $input_dob;
    }

    //email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an email.";
    } else {
        $email = $input_email;
    }

    //phone
    $input_phone = trim($_POST["phone"]);
    if (empty($input_phone)) {
        $phone_err = "Please enter an phone.";
    } else {
        $phone = $input_phone;
    }

    //address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    }elseif($input_address===$address){
        $address_error = "Email was have.";
    } else {
        $address = $input_address;
    }

    //salary
    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
        $salary_err = "Please enter an salary.";
    } else {
        $salary = $input_salary;
    }

    if (empty($name_err) && empty($gender_err) && empty($dob_err) && empty($email_err) && empty($phone_err) && empty($address_err) && empty($salary_err) && empty($image_err)) {
        $sqlCu = "INSERT INTO customer (name, gender, dob, email, phone, address, salary, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sqlCu)) {
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_name, $param_gender, $param_dob, $param_email, $param_phone, $param_address, $param_salary, $param_image);

            $param_name = $name;
            $param_gender = $gender;
            $param_dob = $dob;
            $param_email = $email;
            $param_phone = $phone;
            $param_address = $address;
            $param_salary = $salary;
            $param_image = $image;

            if (mysqli_stmt_execute($stmt)) {
                header("location: datauser.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Plaese try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

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
                            <a href="dasboard.php">
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
                <div class="wrapper">
                    <div class="label">
                        <h2>User Details</h2>
                        <a href="create.php"><i class="fa fa-plus"></i> Add New User</a>
                    </div>
                    <div class="table">
                        <?php
                            require_once "config.php";

                            $sql = "SELECT * FROM customer";
                            if($result = mysqli_query($link, $sql)){
                                if(mysqli_num_rows($result)>0){
                                    echo '<table class="table-data">';
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Name</th>";
                                    echo "<th>Gender</th>";
                                    echo "<th>Date of Birth</th>";
                                    echo "<th>Email</th>";
                                    echo "<th>Phone</th>";
                                    echo "<th>Address</th>";
                                    echo "<th>Salary</th>";
                                    echo "<th>Action</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>".$row['cus_id']."</td>";
                                    echo "<td class='td'>".$row['name']."</td>";
                                    echo "<td class='center td'>".$row['gender']."</td>";
                                    echo "<td class='td'>".$row['dob']."</td>";
                                    echo "<td class='center td'>".$row['email']."</td>";
                                    echo "<td class='td'>".$row['phone']."</td>";
                                    echo "<td class='center td'>".$row['address']."</td>";
                                    echo "<td class='td'>".$row['salary']."</td>";
                                    echo "<td>";
                                        echo '<a href="read.php?cus_id=' . $row['cus_id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class=" fa fa-eye"></span></a>';
                                        echo '<a href="update.php?cus_id=' . $row['cus_id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pen"></span></a>';
                                        echo '<a href="delete.php?cus_id=' . $row['cus_id'] . '" class="mr-3" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                }else{
                                    echo '<div class="alert "><em>No Records where found.</em></div>';
                                }
                            }else{
                                    echo "Oops! Something went wrong. Please try again later.";
                                }
                            mysqli_close($link);
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </mainp>
    <!-- Footer -->
    <footer></footer>

    <script src="src/data/chart.js"></script>
</body>

</html>