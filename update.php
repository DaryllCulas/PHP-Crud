<?php 
### READ ######
# For update.php to be accessible of its database
    require('./database.php');

    if(isset($_POST['edit'])) {
        $editId = $_POST['editId'];
        $editUsername = $_POST['editUsername'];
        $editAge = $_POST['editAge'];
        $editGender = $_POST['editGender'];
        $editPassword = $_POST['editPassword'];

    }

    if(isset($_POST['update'])) {
        $updateId = $_POST['updateId'];
        $updateUsername = $_POST['updateUsername'];
        $updateAge = $_POST['updateAge'];
        $updateGender = $_POST['updateGender'];
        $updatePassword = $_POST['updatePassword'];


$queryUpdate = "UPDATE accounts SET username = '$updateUsername', age = '$updateAge', gender = '$updateGender',
                password = '$updatePassword' WHERE id = $updateId ";
         $sqlUpdate = mysqli_query($connection, $queryUpdate);

         echo '<script>alert("Successfull updated ID: '.$updateId.'!")</script>';
         echo  '<script> window.location.href = "./index.php" </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>

<style>
html, body {
    background-color: skyblue;
    margin: 0;
    padding: 0;
  }
  th {
    border: 2px solid;
  }

  .main {
    height: 33vh;

    /* Grid */
    display: grid;
    grid-template-rows: auto auto 1fr;
    justify-items: center;
    row-gap: 20px;
    
  }
  .main .update-main {
    grid-row: 1/2;
    display: grid;
    grid-auto-rows: auto;
    row-gap: 5px;
  }
  .main .create-main h3 {
    text-align: center;
  }
 

</style>

<body>
    <div class ="main">

        <!-- In this form, the method must be noticed as we can use post superglobal--->
        <!---This form is called UPDATE PROCESS---->
        <form class ="update-main" action="./update.php" method="post"> <!-- <- Let's see the action being accessed by create.php-->
            <h3> UPDATE USER </h3>
            <!-- In this section, we're gonna make four textfields to edit its information-->
                <input type="text" name="updateUsername" placeholder ="Enter your name" value ="<?php echo $editUsername ?>" required/>
                <input type="text" name="updateAge" placeholder ="Enter your age" value ="<?php echo $editAge ?>" required/>
                <input type="text" name="updateGender" placeholder ="Enter your gender" value ="<?php echo $editGender ?>" required/>
                <input type="text" name="updatePassword" placeholder ="Enter your password" value ="<?php echo $editPassword ?>" required/>
                <input type="submit" name = "update" value="UPDATE"/>
                <input type="hidden" name = "updateId" value="<?php echo $editId ?>"/>
                
        </form>
    

</div>
</body>
</html>