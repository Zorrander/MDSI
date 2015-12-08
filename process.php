<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Rapport</title>

</head>

<body>
    <?php
    
        include("BaseXClient.php");

        $action = $_POST['souhait'];
        // SERVER TO DATABASE - XQUERY  
        // create session
        /*$session = new Session("localhost", 1984, "admin", "admin");
        switch ($action) {
            case "matieres":
                $query = "doc('C:\Program Files (x86)\BaseX\MDSI_Database\matiere.xml')//matiere" ;
                break;
            case "enseignants":
                $query = "doc('C:\Program Files (x86)\BaseX\MDSI_Database\enseignant.xml')//enseignant" ;
                break;
        }
        
        $result = $session->query($query);*/
    
        $doc = new DOMDocument;
        $doc->Load('C:\Program Files (x86)\BaseX\MDSI_Database\matiere.xml');

        $xpath = new DOMXPath($doc);

        // Nous commençons à l'élément racine
        $query = '//matiere';

        $entries = $xpath->query($query);
    
        //SERVER TO CLIENT - XSL TRANSFORMATION
    
        $xslDoc = new DOMDocument();
        $xslDoc->load('C:\Program Files (x86)\BaseX\MDSI_Database\index.xsl');
    
        $doc = new DOMDocument();
    
        $root = $doc->appendChild($doc->createElement('matieres'));
        $i = 0;
        while( $matiere = $entries->item($i++) ){
            $node = $doc->importNode( $matiere, true );    
            $root->appendChild($node);                    
        }
        $doc->save('tempDoc.xml');
    
        $xmlDoc = new DOMDocument();
        $xmlDoc->load('tempDoc.xml');
        
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xslDoc);
        echo $proc->transformToXML($xmlDoc);
    
        

?>
</body>

</html>