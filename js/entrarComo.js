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

    document.getElementById("dia1").addEventListener("change", ()=>{
        var dt = "2024-09-09";
        if (document.getElementById("allDay").value.search(dt) < 0){
            document.getElementById("allDay").value += ","+dt;
        }
        else if (document.getElementById("allDay").value.search(dt) >= 0){
            document.getElementById("allDay").value = document.getElementById("allDay").value.replace(dt,"");
        }
        if (document.getElementById("allDay").value[0] == ","){
            document.getElementById("allDay").value = document.getElementById("allDay").value.substring(1)
        }
        if (document.getElementById("allDay").value.length > 0 && document.getElementById("allDay").value[document.getElementById("allDay").value.length-1] == ","){
            document.getElementById("allDay").value = document.getElementById("allDay").value.substring(0,document.getElementById("allDay").value.length-1)
        }
        document.getElementById("allDay").value = document.getElementById("allDay").value.replace(",,",",");
    });

    document.getElementById("dia2").addEventListener("change", ()=>{
        var dt = "2024-09-10";
        if (document.getElementById("allDay").value.search(dt) < 0){
            document.getElementById("allDay").value += ","+dt;
        }
        else if (document.getElementById("allDay").value.search(dt) >= 0){
            document.getElementById("allDay").value = document.getElementById("allDay").value.replace(dt,"");
        }
        if (document.getElementById("allDay").value[0] == ","){
            document.getElementById("allDay").value = document.getElementById("allDay").value.substring(1)
        }
        if (document.getElementById("allDay").value.length > 0 && document.getElementById("allDay").value[document.getElementById("allDay").value.length-1] == ","){
            document.getElementById("allDay").value = document.getElementById("allDay").value.substring(0,document.getElementById("allDay").value.length-1)
        }
        document.getElementById("allDay").value = document.getElementById("allDay").value.replace(",,",",");
    });

    document.getElementById("dia3").addEventListener("change", ()=>{
        var dt = "2024-09-11";
        if (document.getElementById("allDay").value.search(dt) < 0){
            document.getElementById("allDay").value += ","+dt;
        }
        else if (document.getElementById("allDay").value.search(dt) >= 0){
            document.getElementById("allDay").value = document.getElementById("allDay").value.replace(dt,"");
        }
        if (document.getElementById("allDay").value[0] == ","){
            document.getElementById("allDay").value = document.getElementById("allDay").value.substring(1)
        }
        if (document.getElementById("allDay").value.length > 0 && document.getElementById("allDay").value[document.getElementById("allDay").value.length-1] == ","){
            document.getElementById("allDay").value = document.getElementById("allDay").value.substring(0,document.getElementById("allDay").value.length-1)
        }
        document.getElementById("allDay").value = document.getElementById("allDay").value.replace(",,",",");
    });

    document.getElementById("dia4").addEventListener("change", ()=>{
        var dt = "2024-09-12";
        if (document.getElementById("allDay").value.search(dt) < 0){
            document.getElementById("allDay").value += ","+dt;
        }
        else if (document.getElementById("allDay").value.search(dt) >= 0){
            document.getElementById("allDay").value = document.getElementById("allDay").value.replace(dt,"");
        }
        if (document.getElementById("allDay").value[0] == ","){
            document.getElementById("allDay").value = document.getElementById("allDay").value.substring(1)
        }
        if (document.getElementById("allDay").value.length > 0 && document.getElementById("allDay").value[document.getElementById("allDay").value.length-1] == ","){
            document.getElementById("allDay").value = document.getElementById("allDay").value.substring(0,document.getElementById("allDay").value.length-1)
        }
        document.getElementById("allDay").value = document.getElementById("allDay").value.replace(",,",",");
    });

});