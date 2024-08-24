document.addEventListener("DOMContentLoaded", ()=> {
    function hideElement(obj){
        if (document.getElementById(obj).getAttribute("hidden") == null){
            document.getElementById(obj).setAttribute("hidden","true");
        }
        if (document.getElementById(obj).getAttribute("required") && (obj == "selectCurso" || obj == "selectDia")){
            document.getElementById(obj).removeAttribute("required");
            document.getElementById(obj).value = "";
        }
    }

    function showElement(obj){
        if (document.getElementById(obj).getAttribute("hidden")){
            document.getElementById(obj).removeAttribute("hidden");
        }
        if (document.getElementById(obj).getAttribute("required") == null && (obj == "selectCurso" || obj == "selectDia")){
            document.getElementById(obj).setAttribute("required","true");
            document.getElementById(obj).value = "";
        }
    }

    let selecao = document.getElementById("SelectPC");
    selecao.addEventListener("change", ()=>{
        let vlEscolhido = selecao.value;
        if (vlEscolhido == "ALU"){
            showElement("txtCurso");
            showElement("selectCurso");
            hideElement("txtDia");
            hideElement("selectDia");
        }
        else if (vlEscolhido == "CON"){
            showElement("txtDia");
            showElement("selectDia");
            hideElement("txtCurso");
            hideElement("selectCurso");
        }
        else{
            hideElement("txtCurso");
            hideElement("selectCurso");
            hideElement("txtDia");
            hideElement("selectDia");
        }
    });
});