<?php

    # Initializing database properties
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'php-crud'; # name of selected database
    //port = 3306 -> optional

    # Establishing database connection
    $connection = mysqli_connect($host, $user, $password, $database);
    #incase with port -> $connection = mysqli_connect($host, $user, $password, $database, $port);

    # checking database connection (make sure the name of $database is correct)
    if(mysqli_connect_error()) {
        echo "Error: Unable to connect to MYSQL <br>";
        echo "Message: ".mysqli_connect_error()."<br>";
      

    }
    // else {
    //     echo "<script> alert ('successfully connected!'); </script>";
    //     echo "<script> alert ('connected...'); </script>";
    // }




?>