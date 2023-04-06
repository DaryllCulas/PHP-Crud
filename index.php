<?php 
### READ ######
# For read.php to be accessible of its process
    require('./read.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="style.css">
    <title>DashBoard</title>
</head>
<body>
    <div class ="main">

        <!-- In this form, the method must be noticed as we can use post superglobal--->
        <!---This form is called CREATE PROCESS---->
        <form class ="create-main" action="./create.php" method="post"> <!-- <- Let's see the action being accessed by create.php-->
            <h3> CREATE USER </h3>
                <input type="text" name="username" placeholder ="Enter your name" required/>
                <input type="text" name="age" placeholder ="Enter your age" required/>
                <input type="text" name="gender" placeholder ="Enter your gender" required/>
                <input type="text" name="password" placeholder ="Enter your password" required/>
                <input type="submit" name = "create_acct" value="Create">
                
        </form>
    
<table class = "read-main">

    <!-------Attributes----->
    <tr>
        <th>ID</th>
        <th>USERNAME</th>
        <th>AGE</th>
        <th>GENDER</th>
        <th>PASSWORD</th>
        <th>ACTIONS</th>
    </tr>

    <!--- FETCHING VALUES THROUGH LOOPING SINCE WE ARE ALREADY ACCESSED THE read.php ---> 
    <!-- Tuples(Rows)--->
    <?php while($results = mysqli_fetch_array($sqlAccounts)) {    ?>
    <tr>
        <td><?php echo $results['id'] ?> </td>
        <td><?php echo $results['username'] ?> </td>
        <td><?php echo $results['age'] ?></td>
        <td><?php echo $results['gender'] ?></td>
        <td><?php echo $results['password'] ?></td>

    <!-- This is for actionHandling form --->
        <td>
            <form action="#" method="get">
                <input type="submit" name ="edit" value="EDIT">
            </form>

             <form action="#" method="get">
                <input type="submit" name = "delete" value="DELETE">
            </form>
        </td>
    </tr>
    <?php }  ?>
  




</table>
</div>
</body>
</html>