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
    //lancement de la session
    $session = new Session("localhost", 1984, "admin", "admin");
    //creation de la base de données
    $session->execute('create db mdsiDatabase');
    //ajout des fichiers 
    $session->execute("add ../MDSI_Database/");
    // close session
    $session->close();
    
    echo '<script language="javascript"> document.location.replace("rapports.html"); </script>';
?>
</body>

</html>