<?php
    include("autoload.php");

    $head = new Head("Notícias");

    // Adiciona meta tags ao Head
    $head->addMetas(null,null,"UTF-8");
    $head->addMetas(null,"IE=edge",null,"X-UA-Compatible");
    $head->addMetas("viewport","width=device-width, initial-scale=1.0");
    $head->addlink("stylesheet","property/css/style.css"); // Adiciona um link para o arquivo CSS de estilo
    //$head->addlink("stylesheet","https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css",null,"sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD","anonymous");

    // Cria uma instância da classe Body
    $body = new Body("body");

    $divPrincipal = new Div("Div-Noticias");
    $TituloCadastro = new Title("Adicionar notícias",2);

    $divPrincipal->addItens($TituloCadastro->Rederizar());

    $divCadastro = new Div();
    $formCadastro = new Form(null,"POST","Form-Cadastro");

    $formCadastro->addInput("TEXT","","Título da notícia","Input-Cadastro");
    $formCadastro->addInput("TEXT","","Descrição","Input-Cadastro");
    $formCadastro->addInput("TEXT","","URL da imagem","Input-Cadastro");
    $formCadastro->addInput("submit","adicionar",null,"Input-Cadastro-Enviar");

    $divCadastro->addItens($formCadastro->render());
    $divPrincipal->addItens($divCadastro->Renderizar());

    $body->addItens($divPrincipal->Renderizar());

    $html = new Html("pt-br",$head,$body);
    echo $html;

?>