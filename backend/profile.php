<?php

require_once "config.php";
session_start();
if (!isset($_SESSION["loggedin"], $_SESSION['user_id']) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
$user_id = $_SESSION['user_id'];

// Fetch only products belonging to the logged-in user
$stmtPro = $pdo->prepare("SELECT * FROM products WHERE user_id = ?");
$stmtPro->execute([$user_id]);
$products = $stmtPro->fetchAll(PDO::FETCH_ASSOC);
$stmtUser = $pdo->prepare("SELECT balanceUsd FROM users WHERE user_id = ?");
$stmtUser->execute([$user_id]);
$users = $stmtUser->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="./src/css/dashboard.min.css">
    <link rel="stylesheet" href="./src/css/button.min.css">
</head>

<body>
    <headerTop>
        <div class="wrapper-header">
            <div class="controll">
                <img src="https://png.pngtree.com/png-clipart/20231108/original/pngtree-tiger-head-logo-design-png-image_13517862.png">
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
                            <a href="./dasboard.php">
                                <li>Dashboard</li>
                            </a>
                            <a href="datauser.php">
                                <li>Data user</li>
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
                <div class="controllMainProduct">
                    <div class="featureAdd">
                        <a href="editProfile.php?user_id=<?php echo $user_id = $_SESSION['user_id']; ?>" class="btn btn-warning">Edit Profile</a>
                        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                        <a class="btn btn-add" href="addnewproduct.php">Add Product</a>
                    </div>
                    <div class="contentMainProducts">
                    <h2>Balance</h2>
                    <div class="contentA">
                        <div class="usd-container">
                            <label>Currency USD</label>
                            <div class="Value">
                                <span>ACC USD: <?php $sql = "SELECT balanceUsd FROM users WHERE user_id=$user_id";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['balanceUsd'];
                            }
                        }else{
                            echo "0";
                        }
                    ?>$</span>
                            </div>
                        </div>
                    </div>
                    <h3>My Products</h3>
                    <div class="contentProducts">
                        <div class="cardsProducts">
                            <?php $sqlP="SELECT * FROM products WHERE user_id = $user_id";
                                $result = mysqli_query($link, $sqlP);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<div class="card">';
                                        echo '<div class="topCardDe">';
                                        echo '<img src="' . $row["image"] . '">';
                                        echo '</div>';
                                        echo '<div class="bottomCardDe">';
                                        echo '<div class="titleCardsProduct">';
                                        echo '<div class="name">Name: ' . $row["name"] . '</div>';
                                        echo '<div class="price">Price: ' . $row["price"] . ',  Brand: '. $row["brand"] .'</div>';
                                        echo '<div class="price">QTY: ' . $row["quantity"] . '</div>';
                                        echo '</div>';
                                        echo '<div class="btnCardsProduct">';
                                        echo '<div class="clas-btn">';
                                        echo '<a class="btn cart-btn" href="edit.php?pd_id=' . $row['pd_id'] . '">Edit</a>';
                                        echo '<a class="btn delete-btn" href="deleteProduct.php?pd_id=' . $row['pd_id'] . '">Delete</a>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "No products found.";
                                }
                                mysqli_close($link);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </mainp>
</body>

</html>