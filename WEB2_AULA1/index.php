<?php
    require("autoload.php");
    
    $head = new ClaHead("Teste Pagina");

    $head->addMetas('<meta charset="UTF-8">');
    $head->addMetas('<meta charset="UTF-8">');
    
    echo(new claHtml("en",$head,""))

?>