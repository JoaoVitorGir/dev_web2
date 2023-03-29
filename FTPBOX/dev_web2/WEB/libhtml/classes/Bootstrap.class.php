<?php

    class Bootstrap {

        function Modal($title,$modalBody){
           
            $divModal = new Div("modal fade","staticBackdrop","static","false","-1","staticBackdropLabel","true");
            $divModalDialog = New Div("modal-dialog");
            $divModalContent = New Div("modal-content");
            $divModalHead = New Div("modal-header");
            $H1Modal = New Title($title,1,"modal-title fs-5","staticBackdropLabel");
            $btnExitModal = new Button(null,"btn-close","button",null,null,"modal",null,"Close");
            $divModalBody = New Div("modal-body");

            $divModalHead->addItens($H1Modal->Rederizar());
            $divModalHead->addItens($btnExitModal->Renderizar());
            $divModalBody->addItens($modalBody);

            //add as divs uma dentro da outra 
            $divModalContent->addItens($divModalHead->Renderizar());
            $divModalContent->addItens($divModalBody->Renderizar());
            $divModalDialog->addItens($divModalContent->Renderizar());
            $divModal->addItens($divModalDialog->Renderizar());

            //retorna o modal
            return $divModal->Renderizar();   
        }

        function IconeSvg($htmlIcon){
            return $htmlIcon;
        }

    }
?>