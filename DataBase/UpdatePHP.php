<!-- PHP8 -->
<?php
    require_once "config.php";

    $name = $gender = $dob = $email = $phone = $address = $salary = $image = "";
    $name_err = $gender_err = $dob_err = $email_err = $phone_err = $address_err = $salary_err = $image_err = "";

    if(isset($_POST["id"]) && !empty($_POST["id"])){
        $id = $_POST["id"];

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
            $dob_err = "Please enter an dob.";
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

        // //image
        // $input_image = trim($_POST["image"]);
        // if (empty($input_image)) {
        //     $image_err = "Please enter an image.";
        // } else {
        //     $image = $input_image;
        // }

        if (empty($name_err) && empty($gender_err) && empty($dob_err) && empty($email_err) && empty($phone_err) && empty($address_err) && empty($salary_err) && empty($image_err)) {
            $sql = "UPDATE users_tb SET name=?, gender=?, dob=?, email=?, phone=?, address=?, salary=?, image=? WHERE id=?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssssisi", $param_name, $param_gender, $param_dob, $param_email, $param_phone, $param_address, $param_salary, $param_image, $param_id);

                $param_name = $name;
                $param_gender = $gender;
                $param_dob = $dob;
                $param_email = $email;
                $param_phone = $phone;
                $param_address = $address;
                $param_salary = $salary;
                $param_image = $image;
                $param_id = $id;

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
    }else{
        if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id = $_GET["id"];

            $sql = "SELECT * FROM users_tb WHERE id =?";
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                $param_id = $id;

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
                            <h2>Update Record</h2>
                            <div class="col">
                                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>"
                                    method="post" enctype="multipart/form-data">

                                    <div class="group">
                                        <label>Name: </label>
                                        <input type="text" name="name" value="<?php echo $name ?>">
                                    </div>
                                    <div class="group">
                                        <label>Gender: </label>
                                        <input type="text" name="gender" value="<?php echo $gender ?>">
                                    </div>
                                    <div class="group">
                                        <label>Date of Birth</label>
                                        <input type="text" name="dob" value="<?php echo $dob ?>">
                                    </div>
                                    <div class="group">
                                        <label>Email: </label>
                                        <input type="text" name="email" value="<?php echo $email ?>">
                                    </div>
                                    <div class="group">
                                        <label>Phone: </label>
                                        <input type="text" name="phone" value="<?php echo $phone ?>">
                                    </div>

                                    <div class="group">
                                        <label>address: </label>
                                        <textarea name="address" rows="1" cols="10"><?php echo $address; ?></textarea>
                                        <span><?php echo $address_err ?></span>
                                    </div>

                                    <div class="group">
                                        <label>Salary: </label>
                                        <input type="text" name="salary" value="<?php echo $salary ?>">
                                    </div>

                                    <div class="group">
                                        <label>Image: </label>
                                        <input type="text" name="image" value="<?php echo $image ?>">
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" class="btn-submit" value="Submit">
                                </form>
                            </div>

                            <p><a class="btn-cancel" href="datauser.php">Cancel</a></p>
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