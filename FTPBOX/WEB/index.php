<?php
    // Inclui a classe de carregamento automático de arquivos
    require("autoload.php");
    
    session_start();

   // echo "aqui host = ".$_SERVER['SERVER_ADDR'];
    $senha = trim(file_get_contents('configuracao/config.txt'));
    if ($_SERVER['SERVER_ADDR'] == "10.3.80.196"){
        $conect = new ConexaoPG("aluno_1023071","aluno_1023071",$senha,"10.3.80.196");
    }else{
        $conect = new ConexaoPG("dev_web2","postgres",123);
    }
    // Cria uma instância da classe Head
    $head = new Head("WEB SITE");

    // Adiciona meta tags ao Head
    $head->addMetas(null,null,"UTF-8");
    $head->addMetas(null,"IE=edge",null,"X-UA-Compatible");
    $head->addMetas("viewport","width=device-width, initial-scale=1.0");
    $head->addlink("icon","property/css/Icons/rota-66.png","img/png");
    $head->addlink("stylesheet","property/css/style.css"); // Adiciona um link para o arquivo CSS de estilo
    $head->addlink("stylesheet","https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css",null,"sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD","anonymous");

    // Cria uma instância da classe Body
    $body = new Body("body");
    $DivConteudoPagina = new Div("conteudo-pagina","DivConteudoPagina");
    $body->addScript("property/js/functions.js");
    $body->addScript("https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js","sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN","anonymous");
    $body->addScript("https://code.jquery.com/jquery-3.6.0.min.js");
    // Cria uma instância da classe Listas
    $listaMenu = new Listas("ul","lista-menu-itens","lista-ul");

    // Adiciona itens à lista
    //$lista->addItens(new A("#","li-titulo","Título"));
    $listaMenu->addItens(new A("#","links-topMenu","Informações"));
    $listaMenu->addItens(new A("#","links-topMenu","Opções"));
    $listaMenu->addItens(new A("#","links-topMenu","Produtos"));
    $listaMenu->addItens(new A("#","links-topMenu","Promoções"));
    $listaMenu->addItens(new A("#","links-topMenu","Usuários")); 
    
    //Adiciona um menu no topo da pagina
    $topMenu = new Menu("nav topMenu");
    $bootstrap = new Bootstrap();

    //icone para o menu lateral
    $iconeBtn = $bootstrap->IconeSvg("<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"currentColor\" class=\"bi bi-list list-topMenu\" viewBox=\"0 0 16 16\"> <path fill-rule=\"evenodd\" d=\"M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z\"/></svg>");
    $btn = new Button($iconeBtn,"btn","button","modal","#ModalInformacoes");
    $topMenu->addItens($btn->Renderizar());

    $ListaDeTabelas = new Listas("ul","lista-Esquerda",""); //lista de itens 

    // $resposta = $conect->execQuery("select descricao from categorias");

    $SQLSelect = new MontaSQL();
    $SQLSelect->setSelect("menuhome",array("id","descricao"));
    $SQLSelect->addParametros(null,"descricao");
    $resposta = $conect->execQuery($SQLSelect->getSQL());
    foreach($resposta as $linha){
        $ListaDeTabelas->addItens(new A("?id={$linha['id']}","",$linha['descricao'])); 
    }

    $modalInformacoes = $bootstrap->Modal("Inserir Registros","ModalInformacoes",$ListaDeTabelas->Renderizar());    
    $DivConteudoPagina->addItens($modalInformacoes);

    $topMenu->addItens(new A("#","a-titulo","WEB SITE"));
    $topMenu->addItens($listaMenu->Renderizar());
    //icone para alternar entre claro e escuro
    $divIconTema = new Div(null,"icon-dark-light");
    $divIconTema->addItens($bootstrap->IconeSvg('<svg onclick=Light_Dark() xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-brightness-high color-top-menu" viewBox="0 0 16 16"><path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/></svg>'));
    $topMenu->addItens($divIconTema->Renderizar());

    // Adiciona a div ao body
    $DivConteudoPagina->addItens($topMenu->Renderizar());

    // Cria uma instância da classe Div
    $divPrincipal = new Div("container div-principal");
    $row1 = new Div("row"); //cria a row principal
    $colEsquerda = new Div("col-3 col-Esquerda"); //cria a coluna da esquenda onde contem as informações de produtos
    $colDireita = new Div("col-9 col-Direita");    //cria a coluna da direita aonde vai conter imagens dos produtos
    $menuBar = new Div("menu-Bar");
    $itensColEsquerda = new Listas("ul","lista-Esquerda","lista-ul-menu-Bar"); //lista de itens 

    // $resposta = $conect->execQuery("select descricao from categorias");
    $SQLSelect = new MontaSQL();
    $SQLSelect->setSelect("menuhome",array("id","descricao","tabela"));
    $SQLSelect->addParametros(null,"descricao");
    $resposta = $conect->execQuery($SQLSelect->getSQL());;
    foreach($resposta as $linha){
        $itensColEsquerda->addItens(new A("?idLista={$linha['id']}&titulo={$linha['descricao']}&tabela={$linha['tabela']}&NrPagina=1","li-produtos",$linha['descricao'])); 
    }
    
    $titleMenuBar = new Title("LISTAS",2,"title-colEsquerda");
    $menuBar->addItens($titleMenuBar->Rederizar()); //titulo coluna esquerda
    $menuBar->addItens($itensColEsquerda->Renderizar()); //add os itens na culuna
    $colEsquerda->addItens($menuBar->Renderizar());
    
    if (isset($_GET["excluirLinha"])){
        $SQLDeleteLinha = new MontaSQL();
        $SQLDeleteLinha->SetDelete($_GET['tabela']);
        $SQLDeleteLinha->addParametros("id={$_GET['excluirLinha']}");
        
        $conect->execDeleteUpdateInsert($SQLDeleteLinha->getSQL());
    }

    if (isset($_GET['AlteraLinha'])){
        if (isset($_SESSION[$_GET['AlteraLinha']])){
            // print_r( $_SESSION[$_GET['AlteraLinha']]);
            $campos = [];
            $Newvalores = [];
            foreach($_SESSION[$_GET['AlteraLinha']] as $name){
                //so vai conter aqui partir do momento em que a pessoa clicar em salvar alterações
                if (isset($_POST[$name])){
                    // remove tudo so deixa o texto remove até os espaços mas mantei os numeros
                    //echo $_POST[$name]." = ".preg_replace("/[^a-zA-Z0-9]/","",$name)." || ";
                    //remove os numeros
                    //echo $_POST[$name]." = ".preg_replace("/[^a-zA-Z]/","",$name)." || ";

                    $campos[] = preg_replace("/[^a-zA-Z]/","",$name);
                    $Newvalores[] = $_POST[$name];
                }
            }

            $SQLUpdate = new MontaSQL();
            $SQLUpdate->SetUpdate($_GET["tabela"],$campos,$Newvalores);
            $SQLUpdate->addParametros("id = {$_GET["idLinha"]}");
            //echo "SQLUPDATE = ".$SQLUpdate->getSQL();

            if ($SQLUpdate->getSQL() != ""){
                $conect->execDeleteUpdateInsert($SQLUpdate->getSQL());
            }
        }
    }
    
    if (isset($_GET['idLista']) && isset($_GET['titulo'])){

        $divCentertTabela = new Div("div-center-table");

        // adiciona o titulo da tabela de acordo com o que a pessoa clicou
        $titleColDireita = new Title($_GET['titulo'],3,"title-colDireita");
        $divCentertTabela->addItens($titleColDireita->Rederizar()); // titulo da coluna direita

        $table = new Table("table-Produtos");
        // $TitleTable = array("ID","Nome","CPF","Nascimento","Idade","CEP","Bairro","Pai","Mãe");
        $SQLSelect->setSelect("menuhome");
        $SQLSelect->addParametros("id = {$_GET['idLista']}");
        //echo $SQLSelect->getSQL();
        $resposta = $conect->execQuery($SQLSelect->getSQL());

        $Campos = $resposta[0]['campos'];
        
        $arrTitleTable = explode(',',trim($Campos,'{}'));

        
        //icone de adicionar uma nova linha
        array_unshift($arrTitleTable,"");

        $table->addArrTitle($arrTitleTable);

        $SQLSelect->setSelect($resposta[0]['tabela'],explode(',',trim($Campos,'{}')));
        $TabelaSQL = $resposta[0]['tabela'];

        //$SQLSelect->addParametros(null,"id",5,11);
        //Quantas linhas por pagina devem a parecer
        $itensPorPagina = 5;
        $offSet = ($_GET['NrPagina'] - 1) * $itensPorPagina;
        
        $SQLSelect->addParametros(null,"id",$offSet,$itensPorPagina);

        //resposta retorna uma matriz com todos os dados
        $resposta = $conect->execQuery($SQLSelect->getSQL());

        $nrLinha = 0;
        foreach($resposta as $linha){
            $arrlinha = [];
            
            $parametrosAtuais = "?idLista={$_GET['idLista']}&titulo={$_GET['titulo']}&tabela={$_GET['tabela']}&NrPagina={$_GET['NrPagina']}";

            $AncoraExcluir = new A("{$parametrosAtuais}&excluirLinha={$linha['id']}","a-excluir-linha-tabela",
                                   '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash icones-tabela-class" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/></svg>');
            
            $AncoraEditar = new A("{$parametrosAtuais}&AlteraLinha=Linha-{$nrLinha}&idLinha={$linha['id']}","a-editar-linha-tabela",
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square icones-tabela-class" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>');
            
            // so vai aparecer quando a pessoa selecionar a opçao editar
            $BtnSalvarAlteracao = new Button(
                                         '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                         <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                         </svg>',
                                         "icone-salvaAlteracoes",
                                         "submit",null,null,null,"Salvar-{$linha['id']}"
            );
            
            $AncoraEditar->addEventos("LiberaInputsTabela('Linha-{$nrLinha}','Salvar-{$linha['id']}')");
            
            $divIcones = new Div("icones-tabela");
            $divIcones->addItens($AncoraExcluir);
            $divIcones->addItens($AncoraEditar);
            $divIcones->addItens($BtnSalvarAlteracao->Renderizar());
            array_push($arrlinha,$divIcones->Renderizar());

            $nameInputs = [];
            //prenche os valores da linha da tabela
            foreach($linha as $key =>$celula){

                $tipo = gettype($celula);
                //echo "Tipo da célula: $tipo\n";
                if (gettype($celula) == "boolean"){
                    if ($celula == false){
                        array_push($arrlinha,"False");
                    }else{
                        array_push($arrlinha,"True");
                    }
                }else{
                    if ($key != "id"){
                        $input = new Input("text","{$linha['id']}-{$key}","Input{$linha['id']}","table-input",$celula,null,false,true);
                        $input->addEventos(null,"ValidaAlteracaoInput('{$linha['id']}-{$key}')");
                        array_push($arrlinha,$input->Renderizar());
                        //so adiciona aqui os valores do Input o id vai ser passado dirto na URL
                        $nameInputs[] = "{$linha['id']}-{$key}";
                    }else{
                        array_push($arrlinha,$celula);
                    }
                }

            }

            $_SESSION["Linha-{$nrLinha}"] = $nameInputs;

            $table->addLinha($arrlinha);
            $nrLinha++;
        }

        $form = new Form("POST",null,null,"Forme-tabelas");

        $form->AddItemForm($table->Renderizar());

        $BtnNovoRegistro = new Button('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                       <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                       <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                       </svg>',"button-nova-linha","button","modal","#ModalNovoRegistro");

        
        $divCentertTabela->addItens($form->Renderizar());
        $divCentertTabela->addItens($BtnNovoRegistro->Renderizar());

        $SQLSelectTabelaAtual = new MontaSQL();
        $SQLSelectTabelaAtual->setSelect("menuhome",["campos"]);
        $SQLSelectTabelaAtual->addParametros("id={$_GET['idLista']}");

        $ResultadoSQLSelectTabelaAtual = $conect->execQuery($SQLSelectTabelaAtual->getSQL());

        $formInsert = new Form("POST",null,null,"form-Insere-registros");

        $arrayCamposTabela =  explode(',',trim($ResultadoSQLSelectTabelaAtual[0]["campos"],'{}'));

        foreach($arrayCamposTabela as $Campo){
            if ($Campo == "ID"){
                $SelectMaxID = new MontaSQL();
                $SelectMaxID->setSelect($_GET["tabela"],null,null,"ID");
                $resultadoMaxId = $conect->execQuery($SelectMaxID->getSQL());
                $In = new Input("TEXT",$Campo,null,"input-Insere-registro",($resultadoMaxId[0]["max"]+1),$Campo,true,false,true,true);
            }else{
                $In = new Input("TEXT",$Campo,null,"input-Insere-registro",null,$Campo,true,false,true);
            }
            
            $formInsert->AddInput($In->Renderizar());
        }

        $btnSalvar = new Button("Salvar","btn-enviar-registros","SUBMIT");
        
        $formInsert->AddItemForm($btnSalvar->Renderizar());

        $ModalNovoRegistro = $bootstrap->Modal("Inserir registro tabela {$_GET["titulo"]}","ModalNovoRegistro",$formInsert->Renderizar());    
        $DivConteudoPagina->addItens($ModalNovoRegistro);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $valores = [];

            foreach($arrayCamposTabela as $C){
                if (isset($_POST[$C])){
                    if ($C == "ID"){
                        $valores[] = ($resultadoMaxId[0]["max"]+1);
                    }else{
                        $valores[] = $_POST[$C];
                    }
                    unset($_POST[$C]);
                }else{
                    break;
                }
            }
            if ($valores){
                $InsertRegistro = new MontaSQL();
                $InsertRegistro->setInsert($_GET["tabela"],$arrayCamposTabela,$valores);
                $conect->execDeleteUpdateInsert($InsertRegistro->getSQL());
            }
        }
        

        $colDireita->addItens($divCentertTabela->Renderizar());

        $row2Paginas = new Div("row");
        $nav = new Nav();
        $ListaDePagina = new Listas("ul","page-item","pagination");

        $SQLSelectNroLinhas = new MontaSQL();
        $SQLSelectNroLinhas->setSelect($TabelaSQL,null,"*");
        $NrLinhasTabela = $conect->execQuery($SQLSelectNroLinhas->getSQL());

        //adiciona na ancora os parametros que já existem na url
        $parametrosAtuais = "?idLista={$_GET['idLista']}&titulo={$_GET['titulo']}&tabela={$_GET['tabela']}";

        if ($NrLinhasTabela[0]['count'] >= 5){
            for ($QtdPag=0; $QtdPag < ceil($NrLinhasTabela[0]['count'] / $itensPorPagina); $QtdPag++) { 
                $ListaDePagina->addItens(new A($parametrosAtuais."&NrPagina=".($QtdPag+1),"page-link",$QtdPag+1));
            }
        }
         $row2Paginas->addItens($ListaDePagina->Renderizar());
        // $row2Paginas->addItens("Página 1");
        $colDireita->addItens($row2Paginas->Renderizar());
    }

    $row1->addItens($colEsquerda->Renderizar()); // add tudo na row1 
    $row1->addItens($colDireita->Renderizar()); 
    $divPrincipal->addItens($row1->Renderizar()); // adiciona a row na div principal para ficar tudo no centro

    $DivConteudoPagina->addItens($divPrincipal->Renderizar()); // add a div principal no body 

    //rodapé da página
    $footer = new Footer("rodape","Rodape");
    $containerFooter = new Div("container");
    $divInformacoes = new Div();
    $itensFooter = new Listas("ul","","lista-footer"); // lista de itens do footer

    //itens
    $itensFooter->addItens("João Vitor Girardi"); 
    $itensFooter->addItens("web site .Ltda &copy;");
    $itensFooter->addItens("website@website.com");

    $divInformacoes->addItens($itensFooter->Renderizar()); //add os itens para a divi de informações
    $containerFooter->addItens($divInformacoes->Renderizar()); //add ao container dentro do footer

    $footer->addItens($containerFooter->Renderizar());

    //$DivConteudoPagina->addItens($footer->Renderizar());
    $body->addItens($DivConteudoPagina->Renderizar());
    $body->addItens($footer->Renderizar());
    // Cria uma instância da classe Html e adiciona, head e o body criados anteriormente
    $html = new Html("pt-br",$head,$body,"html");
    //Adiciona script Boostrap
    
    echo($html);
    
?>