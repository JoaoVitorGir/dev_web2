<?php
    // Inclui a classe de carregamento automático de arquivos
    require("libhtml/classes/autoload.class.php");
    
    // Cria uma instância da classe Head
    $head = new Head("Teste Pagina");

    // Adiciona meta tags ao Head
    $head->addMetas(null,"IE=edge",null,"X-UA-Compatible");
    $head->addMetas(null,null,"UTF-8");
    $head->addMetas("viewport","width=device-width, initial-scale=1.0");
    
    // Adiciona um link para o arquivo CSS de estilo
    $head->addlink("stylesheet","estilo/style.css");

    // Cria uma instância da classe Body
    $body = new Body();

    // Cria uma instância da classe Div
    $div = new Div("lista");

    // Cria uma instância da classe Listas
    $lista = new Listas("ul","lista-li");

    // Adiciona itens à lista
    $lista->addItens(new A("#","links","Google"));
    $lista->addItens(new A("#","links","Youtube"));

   // $conect = new ConexaoPG("dev_web2","postgres",123);

    //$resposta = $conect->execQuery("select nome from usuario");

    //foreach($resposta as $nomes){
    //    $lista->addItens(new A("#","links",$nomes));
    //}

    // Adiciona a lista à div
    $div->addItens($lista);

    // Adiciona a div ao body
    $body->addItens($div);

    // Cria uma instância da classe Html e adiciona, head e o body criados anteriormente
    echo(new Html("en",$head,$body))
    
?>