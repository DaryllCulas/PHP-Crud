<?php 
    require('./database.php'); # strict include of this file in order to be accessible of its function

    $queryAccounts = "SELECT * FROM accounts"; # Query of Table in Database
    $sqlAccounts = mysqli_query($connection, $queryAccounts); # Combination of Query of connection and database


 ?>
