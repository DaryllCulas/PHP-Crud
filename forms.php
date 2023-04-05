<?php

/* SETTING UP MYSQL DATABASE CONNECTION */
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'php-crud';
    //port = "3306" -> optional


    # Establishing connection
    $connection = mysqli_connect($host, $user, $password, $database);

    # in case include port -> $connection = mysqli_connect($host, $user, $password, $database, $port);


    # Queries for data retrieval
    $queryUser = "SELECT * FROM form";
    $sqlUser = mysqli_query($connection, $queryUser); # Variable name = function of query(name of DBconnection, name of query)
    # shorthand -> $sqlUser = $connection->(queryUser);



    # Fetching data 
// while($results = mysqli_fetch_array($sqlUser)) {
//     echo "[Database] Name: ". $results['name']."<br>";
//     echo "[Database] Age: ".$results['age']."<br>";
//     echo "[Database] Password: ".$results['password']."<br>";
//     echo "<br>";
// }

for($i = 1; $i <= mysqli_num_rows($sqlUser); $i++) {

    $results = mysqli_fetch_array($sqlUser); # fetching array values from table
    echo "[Database] Name: ". $results['name']."<br>";
    echo "[Database] Age: ".$results['age']."<br>";
    echo "[Database] Password: ".$results['password']."<br>";
    echo "<br>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
    <form action="/forms.php" method="post">
    <input type="text" name="name" placeholder="Enter a name: " required/><br/>
    <br/>
    <input type="text" name="age" placeholder="Enter your age: " required/><br/>
    <br/>
    <input type="text" name="password" placeholder="Enter your password: " required/>
    <input type="submit" value="Login">



    </form>
</body>
</html>
<?php
# $_GET[param] - We can get the value from url that based on input of textfield to display its output as if we do this:

// $name = $_GET['name'];
// $age = $_GET['age'];


// echo "Name: ".$name;
// echo "<br>";
// echo "Age: ".$age;

?>