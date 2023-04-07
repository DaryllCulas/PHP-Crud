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
    <!---- Minor Bug: Unable to sort its data---->
    <!-- Remember: putting parameters in href tags must avoid its whitespace when applying $_GET superglobal---->
    <tr>
        <th><a href= "?column=id&sort=<?php echo $sort ?>"> ID </a></th>
        <th><a href= "?column=username&sort=<?php echo $sort ?>"> USERNAME </a></th>
        <th><a href= "?column=age&sort=<?php echo $sort ?>" > AGE </a> </th>
        <th><a href= "?column=gender&sort=<?php echo $sort ?>"> GENDER </a></th>
        <th><a href= "?column=password&sort=<?php echo $sort ?>"> PASSWORD </a></th>
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
            <form action="./update.php" method="post">
                <input type="submit" name ="edit" value="EDIT">
                <input type="hidden" name = "editId" value=" <?php echo $results['id'] ?>" >
                <input type="hidden" name = "editUsername" value=" <?php echo $results['username'] ?>" >
                <input type="hidden" name = "editAge" value=" <?php echo $results['age'] ?>" >
                <input type="hidden" name = "editGender" value=" <?php echo $results['gender'] ?>" >
                <input type="hidden" name = "editPassword" value=" <?php echo $results['password'] ?>" >
            </form>
        


             <form action="./delete.php" method="post">
                <input type="submit" name = "delete" value="DELETE">
                <input type="hidden" name = "deleteId" value=" <?php echo $results['id'] ?>" >
            </form>
        </td>
    </tr>


    <?php }  ?>
  




</table>
</div>
</body>
</html>