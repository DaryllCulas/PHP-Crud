<?php
require('./database.php');

# this is from $_POST['name of form submit_button that located in 'CREATE PROCESS/index.php' ']
if(isset($_POST['create_acct'])) {
    $username = $_POST['username'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

        $queryCreate = "INSERT INTO accounts(username, age, gender, password) VALUES('$username', '$age', '$gender', '$password')";
    /*
        $queryCreate = "INSERT INTO accounts VALUES(null, '$username','$age', $gender, '$password')"; 
        OR $queryCreate = "INSERT INTO accounts VALUES('$username', '$age', '$gender', '$password')";
    */
        $sqlCreate = mysqli_query($connection, $queryCreate);

         echo '<script> alert ("Successfully Created!"); </script>';
    
         # This is for redirecting another file (going to index.php) using JScript
        echo '<script> window.location.href = "./index.php"</script>';
}
else {
        echo '<script> window.location.href = "./index.php"</script>';
}


?>