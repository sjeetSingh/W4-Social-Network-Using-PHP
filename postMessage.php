<html>
<head><title>Post Reply Message!</title></head>
<body>
<?php
    session_start();
    //echo $_SESSION['usernameSession'];

   if ( isset($_POST['postMsg']) )
    {
    	if ( !empty($_SESSION['followsSession']) )	//If there's someone following the Message!
    	{	$followedBy = $_SESSION['followsSession'];	}
    	else 
    	{	$followedBy = null;	}
      	
      	$uniqueID = uniqid();
      
      try 
      {
        $dbname = dirname($_SERVER["SCRIPT_FILENAME"]) . "/mydb.sqlite";
        $dbh = new PDO("sqlite:$dbname");
        $dbh->beginTransaction();
        $var="insert into posts values('".$uniqueID."','".$_SESSION['usernameSession']."','".$followedBy."',datetime('now'),'".$_POST['messageArea']."')";
        $dbh->exec($var)  // Here, 
              or die(print_r($dbh->errorInfo(), true));
        $dbh->commit();

        unset($_SESSION['followsSession']);
        header ('location: userProfile.php');					// Emptying session for new message!	
       }
    	catch (PDOException $e)    
    {
      print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>
    <form method="POST" action="postMessage.php">
    	<textarea name="messageArea" rows="10" cols="30" placeholder="Enter your message here!"></textarea>
    	<br/>
    	<input type="submit" name="postMsg" value="Message Reply!"/>
  	</form>
</body>
</html>