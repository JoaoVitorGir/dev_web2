var dark = true;

function Light_Dark(){
    if (dark){
        document.documentElement.style.setProperty('--dark_primary', '#F1FFF7');
        document.documentElement.style.setProperty('--dark_secundary', '#cdcdcd');
        document.documentElement.style.setProperty('--body-fonts-color', 'black');
        document.documentElement.style.setProperty('--primary-color-table', '#cdcdcd');
        document.documentElement.style.setProperty('--primary-fonts-color-table', 'black');
        document.documentElement.style.setProperty('--body-fonts-color', 'black');
        //altera o icone para claro
        document.getElementById("icon-dark-light").innerHTML = '<svg onclick=Light_Dark() xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-brightness-high-fill color-top-menu" viewBox="0 0 16 16"><path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/></svg>'
    }else{
        document.documentElement.style.setProperty('--dark_primary', '#0e1117');
        document.documentElement.style.setProperty('--dark_secundary', '#181d27');
        document.documentElement.style.setProperty('--body-fonts-color', '181d27');
        document.documentElement.style.setProperty('--primary-color-table', '#191e29be');
        document.documentElement.style.setProperty('--primary-fonts-color-table', '#838383');
        document.documentElement.style.setProperty('--body-fonts-color', '#ffffff');
        document.getElementById("icon-dark-light").innerHTML = '<svg onclick=Light_Dark() xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-brightness-high color-top-menu" viewBox="0 0 16 16"><path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/></svg>'
    }
    dark = !dark;
}


function calculaAlturaRodape(){
    const rodape = document.getElementById("Rodape");
    const alturaRodape = rodape.offsetHeight;
    const margemRodape = parseFloat(getComputedStyle(rodape).marginBottom);
    return alturaRodape + margemRodape;
}

window.addEventListener("load", function(){
    const alturaRodape = calculaAlturaRodape();
    const divprincipal = document.getElementById("DivConteudoPagina");
    divprincipal.style.minHeight = `calc(100% - ${alturaRodape}px)`
})