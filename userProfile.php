<html>
<head><title>User's profile</title></head>
<body>

  <center><a href="postMessage.php"><button>New Post</button></a></center>
  <br/>

    <?php
    session_start();
    if ( isset($_GET['follows']) )
    {
      $_SESSION['followsSession'] = $_GET['follows']; //Storing the Message ID in the session
     // echo $_SESSION['followsSession'];
     header('location: postMessage.php');
    }

    if ( isset($_POST['logOut']) )
    { 
      unset($_SESSION['usernameSession']);
      header ('location: board.php');
    }
    //echo $_SESSION['usernameSession'];
      $uniqueID = uniqid();
      $followedBy = null;
      try 
      {
        $dbname = dirname($_SERVER["SCRIPT_FILENAME"]) . "/mydb.sqlite";
        $dbh = new PDO("sqlite:$dbname");

        $stmt = $dbh->prepare('select * from posts, users where username=postedby');        
        $stmt->execute();
        //print "<pre>";

        echo "<center>";
        echo "<table border=\"3px solid black \">";
        echo "<th>";
        echo "Message ID";
        echo "</th>";
        echo "<th>";
        echo "Posted By";
        echo "</th>";
        echo "<th>";
        echo "Full Name";
        echo "</th>";
        echo "<th>";
        echo "Messagse";
        echo "</th>";
        echo "<th>";
        echo "Follows This Message (id)";
        echo "</th>";
        echo "<th>";
        echo "Date and Time of message Posted";
        echo "</th>";

        while ($row = $stmt->fetch()) 
        {
          //print_r($row);
          echo "<tr>";
          echo "<td>";
          echo $row['id'];
          echo "</td>";
          echo "<td>";
          echo $row['postedby'];
          echo "</td>";
          echo "<td>";
          echo $row['fullname'];
          echo "</td>";
          echo "<td>";
          echo $row['message'];
          echo "</td>";
          echo "<td>";
          echo $row['follows'];
          echo "</td>";        
          echo "<td>";
          echo $row['datetime'];
          echo "</td>";                          
          echo "<td>";
          echo '<form method="GET" action="userProfile.php">';
          echo '<input type="hidden" name="follows" value="'.$row['id'].'">';
          echo '<input type="submit" value="REPLY"/>';
          echo "</form>";
          echo "</td>";
          echo "</tr>";
        }
        //print "</pre>";
      echo "</table>";
      echo "</center>";
      }
    catch (PDOException $e)    
    {
      print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
  
?>
  <form method="POST" action="userProfile.php">
    <br/>
    <center>
      <input type="submit" name="logOut" value="Log Me Out!">
    </center>
  </form>
</body>
</html>
