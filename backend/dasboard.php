<?php

require_once "config.php";
session_start();
if (!isset($_SESSION["loggedin"], $_SESSION['user_id']) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <link rel="icon" href="">
    <link rel="stylesheet" href="./src/css/dashboard.min.css">
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
                            <a href="dasboard.php">
                                <li class="Active">Dashboard</li>
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
                <div class="topleft">
                    <h2>Percent Resquest</h2>
                    <div class="container">
                        <canvas id="morphChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="pieiner">
                        <canvas id="myPieChart" width="400" height="400"></canvas>
                    </div>
                    <div>
                        <p>End task</p>
                    </div>
                </div>
            </main>
            <section>
                <div class="content">
                    <div class="topContentBalan">
                        <h2>Balance</h2>
                    <div class="usd-container">
                        <label>Currency USD</label>
                        <div class="Value">
                            <?php $sqlCe=" SELECT balanceUsd FROM users WHERE user_id = $user_id";
                                $result = mysqli_query($link, $sqlCe);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<span>';
                                    echo 'ACC USD : '. $row["balanceUsd"] .'$';
                                    echo '</span>';
                                    }
                                }else{
                                    echo '<span>';
                                    echo 'ACC USD : 0$';
                                    echo '</span>';
                                }

                            ?>
                        </div>
                    </div>
                    </div>
                    <div class="perfomance">
                        <canvas id="myPerformanceChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </mainp>
<!----------------------------------------->
<!--         Script data chart           -->
<script>
    // --- 1. The Morph ---
    const morphCtx = document.getElementById('morphChart').getContext('2d');
    const morphChart = new Chart(morphCtx, {
        type: 'bar',
        data: {
            labels: [<?php $sqlNY = "SELECT * FROM datauserrequest WHERE nameYear";
                        $result = mysqli_query($link, $sqlNY);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['nameYear'].',';
                            }
                        }
                    ?>],
            datasets: [{
                label: 'Weekly User Resquest',
                data: [<?php $sqlW = "SELECT * FROM datauserrequest WHERE week";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['week'].',';
                            }
                        }
                    ?>],
                backgroundColor: 'rgba(20, 12, 93, 0.6)',
                borderColor: 'rgba(93, 12, 12, 1)',
                borderWidth: 1
            }, {
                label: 'Monthly User Resquest',
                data: [<?php $sqlW = "SELECT * FROM datauserrequest WHERE month";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['month'].',';
                            }
                        }
                    ?>],
                backgroundColor: 'rgba(12, 93, 15, 0.6)',
                borderColor: 'rgba(93, 12, 12, 1)',
                borderWidth: 1
            }, {
                label: 'Yearly User Resquest',
                data: [<?php $sqlW = "SELECT * FROM datauserrequest WHERE year";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['year'].',';
                            }
                        }

                    ?>],
                backgroundColor: 'rgba(153, 11, 11, 0.6)',
                borderColor: 'rgba(93, 12, 12, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1500,
                // This is the key! A more complex easing function.
                easing: 'easeInOutQuart',
                // Create a wave effect by delaying each bar's animation.
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default') {
                        delay = context.dataIndex * 100 + context.datasetIndex * 50;
                    }
                    return delay;
                },
            },
            scales: {
                y: { beginAtZero: true, grid: { color: '#444' }, ticks: { color: '#000000FF' } },
                x: { grid: { color: '#444' }, ticks: { color: '#000000FF' } }
            }
        }
    });

    function morphData() {
        morphChart.data.datasets[0].data = morphChart.data.datasets[0].data.map(() => Math.floor(Math.random() * 1000));
        morphChart.update();
    }

    //Secondary
    const threeChartctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(threeChartctx, {
        type: 'bar',
        data: {
            labels: ['User', 'Products', 'Course'],
            datasets: [{
                label: '# of data',
                data: [<?php $sqlW = "SELECT SUM(valueA) AS totalU FROM users WHERE user_id";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['totalU'];
                            }
                        }
                    ?>, <?php $sqlW = "SELECT SUM(valueA) AS total FROM products WHERE pd_id";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['total'];
                            }
                        }
                    ?>, 0],
                backgroundColor: [
                    'rgba(255, 0, 50, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 100, 0, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 100, 0, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                // Standard Main Title
                title: {
                    display: true,
                    text: 'Main Chart Title',
                    font: { size: 18, weight: 'bold' },
                    color: '#333',
                    padding: { bottom: 20 }
                },
                // Our Custom Secondary Title
                secondaryTitle: {
                    display: true,
                    text: ['Secondary Title', 'A Subtitle for Detail'],
                    position: 'top', // 'top', 'bottom', 'left', 'right'
                    align: 'center', // 'start', 'center', 'end'
                    font: {
                        size: 14,
                        weight: 'normal',
                        family: "'Trebuchet MS', sans-serif",
                        style: 'italic'
                    },
                    color: '#666',
                    padding: {
                        top: 5,
                        bottom: 10,
                        left: 10,
                        right: 10
                    },
                    fullWidth: true
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Get the context of the canvas element we want to select
const ctx = document.getElementById('myPieChart').getContext('2d');
// Create the chart
const myPieChart = new Chart(ctx, {
    type: 'pie', // The type of chart we want to create
    data: {
        labels: ['User', 'Product', 'Course'],
        datasets: [{
            label: 'Traffic Source',
            data: [<?php $sqlW = "SELECT SUM(valueA) AS totalU FROM users WHERE user_id";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['totalU'];
                            }
                        }
                    ?>,  <?php $sqlW = "SELECT SUM(valueA) AS total FROM products WHERE pd_id";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['total'];
                            }
                        }
                    ?>, 0],
            backgroundColor: [
                '#d62728',
                '#1F99B4FF',
                '#ff7f0e',

            ],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Percentage of Total Traffic'
            }
        }
    }
});
const perfomctx = document.getElementById('myPerformanceChart').getContext('2d');

const myPerformanceChart = new Chart(perfomctx, {
    type: 'line', // The type of chart
    data: {
        labels: ['12:00', '15:00', '18:00', '21:00', '1:00', '3:00', '6:00', '9:00'],
        datasets: [{
                label: 'Your Balance after insign',
                data: [<?php $sqlW = "SELECT balanceUsd FROM users WHERE user_id=$user_id";
                        $result = mysqli_query($link, $sqlW);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['balanceUsd'].'/5,';
                            }
                        }
                        mysqli_close($link);
                    ?>],
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.1)', // Light fill
                tension: 0.1, // Makes the line slightly curved
                fill: true
            },
            {
                label: 'Limit Line 1500',
                data: [1500, 1500, 1500, 1500, 1500, 1500, 1500, 1500],
                borderColor: 'red',
                borderDash: [5, 5], // Creates a dashed line
                pointRadius: 0, // Hide points on the target line
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: false, // Start closer to the data range
                title: {
                    display: true,
                    text: 'Insign (seconds)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Hour of the Day'
                }
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Line Insign'
            }
        }
    }
});

</script>
</body>

</html>