<?php
session_start();

require("autoload.php");

  if (isset($_SESSION['Noticia'])) {
    $head = new Head('Noticia');
    $head->addMetas(null,null,"UTF-8");
    $head->addMetas(null,"IE=edge",null,"X-UA-Compatible");
    $head->addMetas("viewport","width=device-width, initial-scale=1.0");

    $body = new Body();
    $body->addItens($_SESSION['Noticia']);

    $html = new Html('pt-br',$head,$body);
    echo $html;
  } else {
    echo '<p>Nenhum noticia selecionada.</p>';
  }
?>