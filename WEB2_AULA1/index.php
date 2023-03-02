<?php
    require("libhtml/classes/autoload.class.php");
    
    $head = new Head("Teste Pagina");

    $head->addMetas(null,"IE=edge",null,"X-UA-Compatible");
    $head->addMetas(null,null,"UTF-8");
    $head->addMetas("viewport","width=device-width, initial-scale=1.0");
    
    echo(new Html("en",$head,""))

?>
