<?php 
    require('./database.php'); # strict include of this file in order to be accessible of its function

    $sort = "ASC";
    $column = "id";

    if(isset($_GET['column']) && isset($_GET['sort'])) { 
        $sort = $_GET['sort'];
        $column = $_GET['column'];

     $sort == 'ASC' ? $sort = 'DESC' : $sort = 'ASC';
    
     
    }



    $queryAccounts = "SELECT * FROM accounts ORDER BY $column $sort"; # Query of Table in Database
    $sqlAccounts = mysqli_query($connection, $queryAccounts); # Combination of Query of connection and database




 ?>
