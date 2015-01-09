<html>
  <body>
<?php
  if(!empty($_POST['newusr']))
  {
    $newUsrReg = $_POST['newusr'];
    $newPwdReg = $_POST['newPwd'];
    $newFNameReg = $_POST['newfullname'];
    $newPwdRegMd = md5( $newPwdReg );
    $newEmailReg = $_POST['newEmail'];

    echo "<h2>User Registered</h2>";
    echo "<br/>";
    echo "Username: ".$newUsrReg;

    try 
    {
        $dbname = dirname($_SERVER["SCRIPT_FILENAME"]) . "/mydb.sqlite";
        $dbh = new PDO("sqlite:$dbname");
        $dbh->beginTransaction();
            $dbh->exec('insert into users values("'.$newUsrReg.'","'.$newPwdRegMd.'","'.$newFNameReg.'","'.$newEmailReg.'")')
              or die(print_r($dbh->errorInfo(), true));
        $dbh->commit();
        header('location: board.php');
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