<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Create database</title>

</head>

<body>
    <?php
    
    include("BaseXClient.php");
    $session = new Session("localhost", 1984, "admin", "admin");
    $session->execute('drop db mdsiDatabase');
  
    // close session
    $session->close();
    
    echo '<script language="javascript"> document.location.replace("index.html"); </script>';
?>
</body>

</html>