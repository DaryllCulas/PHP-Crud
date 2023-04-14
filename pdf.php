<?php

require('./database.php'); # To access its database connection from database.php
require_once __DIR__ . '/vendor/autoload.php'; 

# When the user is requesting a PDF exported
    if(isset($_POST['Export_PDF'])) {

        $dbAdmin = "Daryll_Culas"; # Name of data admin
        $currentDate = date("Y-m-d h:m:s");  # current date
        
        
        
        # copy the queries from the read.php
        $queryAccounts = "SELECT * FROM accounts"; # Query of Table in Database
        $sqlAccounts = mysqli_query($connection, $queryAccounts); # Combination of connection of database's table and query
        
        
        
        # FETCHING DATA FROM INDEX.PHP
        $row_Accounts = ""; # Assigning to string to fetch the data by looping || storing data strings
        while($rowAccount = mysqli_fetch_array($sqlAccounts)) {
            $row_Accounts = $row_Accounts.'
            <tr>
                <td>'.$rowAccount['id'].'</td>
                <td>'.$rowAccount['username'].'</td>
                <td>'.$rowAccount['age'].'</td>
                <td>'.$rowAccount['gender'].'</td>
                <td>'.$rowAccount['password'].'</td>
            <tr>
            
            ';
        }
        
        
        # PDF LAYOUTING USING HTML AND CSS external type
        $html = '
            <link rel="stylesheet" href="./pdf.css"> 
        
            
            <h1>ACCOUNTS DATA</h1>
            <table>
                <tr>
                    <td><strong>Name: </strong></td>
                    <td>'.$dbAdmin.'</td>
                <tr>
                <tr>
                    <td><strong>Date Exported: </strong></td>
                    <td>'.$currentDate.'</td>
                </tr>
            </table>
            <table class="account_Table">
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>AGE</th>
                    <th>GENDER</th>
                    <th>PASSWORD</th>
                </tr>
        
                <!---DISPLAYING DATA--->
                
                <tr>
                '.$row_Accounts.'
                
            </table>
        
        ';
        
        # Initialization for PDF exporting
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output("$currentDate-.Sample_Data.pdf", "D"); # Current Date, name of pdf exported and D - Download(Optional)

    }
    else {
            echo '<script>window.location.href="./index.php" </script>'; # for redirecting(index.php) when the user is not requesting the PDF export
    }




?>
