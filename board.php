<html>
<head><title>Message Board</title></head>
<body>
  <center><H2> WELCOME TO PHASE-BUK! </H2></center>
  <center><form name="login_form" method="POST" action="board.php">
    <input type="text" name="uname" placeholder="Enter Username here"/>
    <input type="password" name="pwd" placeholder="Enter Password here"/>
    <input type="submit" value="Log In" />
  </form></center>
  <center><form name="new_user" method="POST" action="newuser.php">
    <input type="submit" value="You new here? Register and be a part of us!" name="regBtn"/>
  </form></center>
  
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors','On');

if(isset($_POST['uname']))
  {
    try {
          $usernameQ = $_POST['uname'];
          $pwdQ = $_POST['pwd'];

          $dbname = dirname($_SERVER["SCRIPT_FILENAME"]) . "/mydb.sqlite";
          $dbh = new PDO("sqlite:$dbname");
          $dbh->beginTransaction();
          $stmt = $dbh->prepare('select count(*) from users where username = "'.$usernameQ.'" AND password="'.$pwdQ.'" '); // where username='.$usernameQ.' AND password='.$pwdQ.' ');
          $stmt->execute();


          while ($row = $stmt->fetch()) 
          {
            if ( $row[0]==1 )             // $row==1 means there's a row with username as '$username' and password as '$pwdQ' fetched from the user
            {
              echo "Login Successfull!";
              $_SESSION['usernameSession']=$usernameQ;
              echo $_SESSION['usernameSession'];
              header ('location: userProfile.php' );
            }
            else 
            {
              echo "Login Unsuccessfull! Please fill in correct details!";
            }
          }
      } 
      catch (PDOException $e) 
      {
         print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
  }

?>
</body>
</html>
