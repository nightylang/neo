<!-- PHP8 -->
<?php
    require_once "config.php";
    
    session_start();
    if (!isset($_SESSION["loggedin"], $_SESSION['user_id']) || $_SESSION["loggedin"] !== true) {
        header("location: index.php");
        exit;
    }
    $user_id = $_SESSION['user_id'];


$name = $quantity = $price = $image = "";
$name_err = $quantity_err = $price_err = $image_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_name;
    }

    //quantity
    $input_quantity = trim($_POST["quantity"]);
    if (empty($input_quantity)) {
        $quantity_err = "Please enter an quantity.";
    } else {
        $quantity = $input_quantity;
    }

    //price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter an price.";
    } else {
        $price = $input_price;
    }

    //image
    $input_image = trim($_POST["image"]);
    if (empty($input_image)) {
        $image_err = "Please enter an image.";
    } else {
        $image = $input_image;
    }

    if (empty($name_err) && empty($quantity_err) && empty($price_err) && empty($image_err)) {
        $sql = "INSERT INTO products (user_id, name, quantity, price, image) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "isiis", $param_user_id, $param_name, $param_quantity, $param_price, $param_image);

            $param_user_id = $_SESSION['user_id'];
            $param_name = $name;
            $param_quantity = $quantity;
            $param_price = $price;
            $param_image = $image;

            if (mysqli_stmt_execute($stmt)) {
                header("location: profile.php");
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
                            <a href="dasboard.php">
                                <li >Dashboard</li>
                            </a>
                            <a href="datauser.php">
                                <li>Data user</li>
                            </a>
                            <a href="#">
                                <li>Course</li>
                            </a>
                            <a href="products.php">
                                <li class="Active">Product</li>
                            </a>
                            <a href="search-form.php">
                                <li>Search</li>
                            </a>
                            <a href="logout.php">
                                <li>Logout Acc</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- main -->
            <main>
                <div>
                    <h2 style="margin-bottom: 25px;">Add new Product</h2>
                    <p class="p">Please fill this form and submit to add product record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" name="name" value="<?php echo $name; ?>"><br>
                            <span class="error"><?php echo $name_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Quantity: </label>
                            <input class="gender" type="text" name="quantity" value="<?php echo $quantity; ?>"><br>
                            <span class="error"><?php echo $quantity_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Price: </label>
                            <input type="text" name="price" value="<?php echo $price; ?>"><br>
                            <span class="error"><?php echo $price_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Brand: </label>
                            <input type="text" name="brand" value="<?php echo $price; ?>"><br>
                            <span class="error"><?php echo $price_err ?></span>
                        </div>

                        <div class="form-group">
                            <label>Image: </label>
                            <input type="text" name="image" value="<?php echo $image; ?>"><br>
                            <!-- <input type="file" name="image" value="<?php echo $image; ?>"><br> -->
                            <span class="error"><?php echo $image_err ?></span>
                        </div>

                        <input type="submit" class="btn-submit" value="Submit">
                        <a href="profile.php" class="btn-cancel">Cancel</a>

                    </form>
                </div>
            </main>
        </div>
    </mainp>
    <!-- Footer -->
    <footer></footer>

</body>

</html>