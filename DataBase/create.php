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
<!-- PHP8 Con data -->
<?php

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

    //image
    $input_image = trim($_POST["image"]);
    if (empty($input_image)) {
        $image_err = "Please enter an image.";
    } else {
        $image = $input_image;
    }

    if (empty($name_err) && empty($gender_err) && empty($dob_err) && empty($email_err) && empty($phone_err) && empty($address_err) && empty($salary_err) && empty($image_err)) {
        $sql = "INSERT INTO customer (name, gender, dob, email, phone, address, salary, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssisis", $param_name, $param_gender, $param_dob, $param_email, $param_phone, $param_address, $param_salary, $param_image);

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
                                <li >Dashboard</li>
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
                <div>
                    <h2 style="margin-bottom: 25px;">Add new Column</h2>
                    <p class="p">Please fill this form and submit to add user to customer the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" name="name" value="<?php echo $name; ?>"><br>
                            <span class="error"><?php echo $name_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Gender: </label>
                            <input class="gender" type="text" name="gender" value="<?php echo $gender; ?>"><br>
                            <span class="error"><?php echo $gender_err ?></span>
                        </div>


                        <div class="form-group">
                            <label>Date of Birth: </label>
                            <input type="text" name="dob" value="<?php echo $dob; ?>"><br>
                            <span class="error"><?php echo $dob_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" name="email" value="<?php echo $email; ?>"><br>
                            <span class="error"><?php echo $email_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Phone: </label>
                            <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
                            <span class="error"><?php echo $phone_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Address: </label>
                            <textarea name="address" rows="1" cols="10"><?php echo $address; ?></textarea><br>
                            <span class="error"><?php echo $address_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Salary: </label>
                            <input class="salary" type="text" name="salary" value="<?php echo $salary; ?>"><br>
                            <span class="error"><?php echo $salary_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Image: </label>
                            <input class="image" type="text" name="image" value="<?php echo $image; ?>"><br>
                            <span class="error"><?php echo $image_err ?></span>
                        </div>

                        <input type="submit" class="btn-submit" value="Submit">
                        <a href="datauser.php" class="btn-cancel">Cancel</a>

                    </form>
                </div>
            </main>
        </div>
    </mainp>
    <!-- Footer -->
    <footer></footer>

</body>

</html>