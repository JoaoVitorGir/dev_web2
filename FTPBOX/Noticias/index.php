<?php
    require("autoload.php");

session_start();
session_unset(); 
session_destroy();



    $head = new Head("Notícias");

    // Adiciona meta tags ao Head
    $head->addMetas(null,null,"UTF-8");
    $head->addMetas(null,"IE=edge",null,"X-UA-Compatible");
    $head->addMetas("viewport","width=device-width, initial-scale=1.0");
    $head->addlink("stylesheet","property/css/style.css"); // Adiciona um link para o arquivo CSS de estilo
    $head->addlink("stylesheet","https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css",null,"sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD","anonymous");

    // Cria uma instância da classe Body
    $body = new Body("body");

    
    
    $form1 = new Form("ETs","POST","Form");
    $divImg = new Div("Div-Img");
    $Imagem = new Img("https://http2.mlstatic.com/D_NQ_NP_677785-MLB49785835278_042022-W.jpg");
    $divImg->addItens($Imagem->Renderizar());

    $P_Not_01 = new P("");
    $P_Not_01->addValue("Uma notícia recente sugere que cientistas de todo o mundo estão se preparando para investigar uma possível detecção de sinais de comunicação extraterrestre. A equipe de pesquisadores liderada pela Universidade de Harvard estará usando o telescópio Murchison Widefield Array (MWA), localizado na Austrália Ocidental, para rastrear uma região do espaço conhecida por abrigar planetas potencialmente habitáveis.");
    $P_Data = new P("Data-end");
    $P_Data->addValue("01/02/2023");
    $div = new Div("Div-descricao");
    $div->addItens($P_Not_01->Renderizar());
    $div->addItens($P_Data->Renderizar());
    $formBody = new Div("Form-Content");
    $formBody->addItens($divImg->Renderizar());
    $formBody->addItens($div->Renderizar());

    $form1->addBody($formBody->Renderizar());
    $form1->addInput("submit","Saiba mais");

    
    $form2 = new Form("Kink Jon Run","POST","Form");
    $divImg = new Div("Div-Img");
    $Imagem = new Img("https://vejasp.abril.com.br/wp-content/uploads/2016/12/3c9lkg3.jpg?quality=70&strip=info&w=858&h=536&crop=1");
    $divImg->addItens($Imagem->Renderizar());

    $P_Not_01 = new P("");
    $P_Not_01->addValue("Kink Jon Run, famoso empresário do ramo de brinquedos adultos, visitou uma fábrica de lubrificantes em São Paulo nesta terça-feira (24). Durante a visita, o empresário conheceu o processo de fabricação dos produtos e conversou com os funcionários da empresa.
                        A visita de Kink Jon Run à fábrica de lubrificantes tem como objetivo buscar novas parcerias e expandir seus negócios no Brasil. O empresário afirmou estar impressionado com a qualidade dos produtos e a eficiência da fábrica.");
    $P_Data = new P("Data-end");
    $P_Data->addValue("01/01/2023");
    $div = new Div("Div-descricao");
    $div->addItens($P_Not_01->Renderizar());
    $div->addItens($P_Data->Renderizar());
    $formBody = new Div("Form-Content");
    $formBody->addItens($divImg->Renderizar());
    $formBody->addItens($div->Renderizar());

    $form2->addBody($formBody->Renderizar());
    $form2->addInput("submit","Saiba mais"); 


    $divPrincipal = new Div("Div-Principal");

    $divNoticia1 = new Div("Card-noticias");
    $divNoticia1->addItens($form1->Render());
    $divNoticia2 = new Div("Card-noticias");
    $divNoticia2->addItens($form2->Render());

    $divNoticia3 = new Div("Card-noticias");
    $divNoticia3->addItens($form1->Render());
    $divNoticia4 = new Div("Card-noticias");
    $divNoticia4->addItens($form2->Render());


    $divPrincipal->addItens($divNoticia1->Renderizar());
    $divPrincipal->addItens($divNoticia2->Renderizar());
    $divPrincipal->addItens($divNoticia3->Renderizar());
    $divPrincipal->addItens($divNoticia4->Renderizar());


    $bootstrap = new Bootstrap();

    $divAddNoticia = new Div("Div-Noticias");
    // $TituloCadastro = new Title("Adicionar notícias",2);

    // $divAddNoticia->addItens($TituloCadastro->Rederizar());

    $divCadastro = new Div();
    $formCadastro = new Form(null,"POST","Form-Cadastro");

    $formCadastro->addInput("TEXT","","Título da notícia","Input-Cadastro","inputTitle");
    $formCadastro->addInput("TEXT","","Descrição","Input-Cadastro","inputDescricao");
    $formCadastro->addInput("TEXT","","URL da imagem","Input-Cadastro","inputURL");
    $formCadastro->addInput("submit","adicionar",null,"Input-Cadastro-Enviar");

    $divCadastro->addItens($formCadastro->render());
    $divAddNoticia->addItens($divCadastro->Renderizar());
    $modal = $bootstrap->Modal("Adicionar Notícias",$divAddNoticia->Renderizar());  
    
    
    $btn = new Button("Adicionar Notícia","Btn-Add-Noticia","button","modal","#staticBackdrop");
    $body->addItens($btn->Renderizar());
    $body->addItens($modal);
    

    $body->addItens($divPrincipal->Renderizar());
    $body->addScript("https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js","sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN","anonymous");

    $html = new Html("pt-br",$head,$body);
    echo $html;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Noticia = 'aqui vc vai saber mais sobre as noticias';
        // Armazena o Form com a noticia
        $_SESSION['Noticia'] = $Noticia;
        // Redireciona o usuário para a página de exibição
        header('Location: http://localhost/dev_web2/Atividade/exibir.php');
    exit;
    }
?>