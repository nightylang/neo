<?php


$conn = mysqli_connect("localhost:3306", "name_user", "Password", "Database_name");

if($conn){
    echo "connected";
}else{
    echo "not connected";
}

?>