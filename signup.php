<html>
<head></head>
<body>
    <?php
        $username = '';
        $password = '';
        $lastName = '';
        $firstName = '';
        $email = '';
        $phone = '';
        if(isset($_POST["username"]))$username = $_POST['username'];
        if(isset($_POST["password"]))$password = $_POST['password'];
        if(isset($_POST["lastName"]))$lastName = $_POST['lastName'];
        if(isset($_POST["firstName"]))$firstName = $_POST['firstName'];
        if(isset($_POST["email"]))$email = $_POST['email'];
        if(isset($_POST["phone"]))$phone = $_POST['phone'];
        /** if(empty($firstName))
        {
            echo "Please go back and fill out your first name";
        }
        if(empty($lastName))
        {
            echo "Please go back and fill out your last name";
        }
        if(empty($email))
        {
            echo "Please go back and fill out your email address";
        }
        if(empty($phone))
        {
            echo "Please go back and fill out your phone number";
        }
        if(empty($username))
        {
            echo "The username is empty!\n";
            echo "Please go back and input the username";
        }
        if(empty($password))
        {
            echo "The password is empty!\n";
            echo "Please go back and input the password";
        }*/
        //connect to database
        $connection = mysqli_connect("localhost","webphp","password");
        mysqli_select_db($connection,"finaldb");
        //check if credentials already exist
        $selectQuery = "SELECT username FROM auth WHERE username = '$username'";
        $selecting = mysqli_query($connection,$selectQuery);
        /** if($selecting || mysql_num_rows($selecting) > 0)
        {
            echo "This username already exists";
            echo "Please go back and change your username";
        }
        else
        {*/
    
            $insertNewInfo = "INSERT INTO auth (username, password, firstName, lastName, email, phone) VALUES ($username, $password, $firstName, $lastName, $email, $phone)";
            $insertingNewUser = mysqli_query($connection,$selectQuery);
            echo "You are registered now!";
            showTable();
       // }
    function showTable()
    {
        $getTable = "SELECT * FROM auth";
        $connection = mysqli_connect("localhost","webphp","password");
        $gettingTable='';   
        if(mysqli_query($connection,$getTable)){
            $gettingTable = mysqli_query($connection,$getTable);

        }
        while($singleRow = mysqli_fetch_row($gettingTable))
        {
          $fieldFirstName = $singleRow["firstName"];
          $fieldLastName = $singleRow["lastName"];
            
          echo '<tr>
                    <td>'.$fieldFirstName.'</td> 
                    <td>'.$fieldLastName.'</td>
               </tr>';
        }
    }
    mysqli_close($connection);

?>
</body>
</html>
