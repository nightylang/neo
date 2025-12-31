
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUS Student</title>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <link rel="icon" href="">
    <link rel="stylesheet" href="src/css/dashboard.min.css">
     <link rel="stylesheet" href="src/css/main.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
    $('.search-box input[type="text"]').on("keyup input", function() {
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if (inputVal.length) {
            $.get("backend-search.php", { term: inputVal }).done(function(data) {
                resultDropdown.html(data);
            });
        } else {
            resultDropdown.empty();
        }
    });
    
    $(document).on("click", ".result p", function() {
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body>
    <main>
        <div class="wrapper">
            <div class="search-box">
                <input type="text" autocomplete="off" placeholder="Search Country..... "/>
                <div class="result"></div>
            </div>
        </div>
    </main>
    <!-- <script src="./src/data/search.js"></script> -->
</body>
</html>