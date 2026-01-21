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
<!-- HTML Site -->
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEO Store</title>
    <link rel="stylesheet" href="src/css/dashboard.min.css">
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
                                <li class="Active">Product</li>
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
            <main>
                <h5><a href="">Check Out</a>><a href="">Payment</a></h5>
                <form action="">

                </form>
                            <?php $sqlCa = "SELECT * FROM products";
                                $result = mysqli_query($link, $sqlCa);
                                if (mysqli_num_rows($result) >0) {
                                    if($row = mysqli_fetch_assoc($result)) {
                                        echo '<a class="btn cart-btn" href="process1Buy.php?pd_id='.$row["pd_id"].'">Continue</a>';
                                    }
                                }
                                mysqli_close($link);
                            ?>
            </main>
            </div>
    </mainp>
 </body>
 </html>