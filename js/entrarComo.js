document.addEventListener("DOMContentLoaded", ()=> {
    function hideElement(obj){
        if (document.getElementById(obj).getAttribute("hidden") == null){
            document.getElementById(obj).setAttribute("hidden","true");
        }
        if (document.getElementById(obj).getAttribute("required") && (obj == "selectCurso" || obj == "selectDia" || obj == "allDay" || obj == "allCurso")){
            document.getElementById(obj).removeAttribute("required");
            document.getElementById(obj).value = "";
        }
    }

    function showElement(obj){
        if (document.getElementById(obj).getAttribute("hidden")){
            document.getElementById(obj).removeAttribute("hidden");
        }
        if (document.getElementById(obj).getAttribute("required") == null && (obj == "selectCurso" || obj == "selectDia" || obj == "allDay" || obj == "allCurso")){
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
            showElement("allCurso");
            showElement("txtDia");
            showElement("selectDia");
            showElement("allDay");
            select("none");
        }
        else if (vlEscolhido == "CON"){
            showElement("txtDia");
            showElement("selectDia");
            showElement("allDay");
            hideElement("txtCurso");
            hideElement("selectCurso");
            hideElement("allCurso");
            select("none");
        }
        else{
            hideElement("txtCurso");
            hideElement("selectCurso");
            hideElement("allCurso");
            hideElement("txtDia");
            hideElement("selectDia");
            hideElement("allDay");
        }
    });

    function updtDay(dt){
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
    }

    document.getElementById("dia1").addEventListener("change", ()=>{
        var dated = "2024-09-09";
        updtDay(dated);
    });

    document.getElementById("dia2").addEventListener("change", ()=>{
        var dated = "2024-09-10";
        updtDay(dated);
    });

    document.getElementById("dia3").addEventListener("change", ()=>{
        var dated = "2024-09-11";
        updtDay(dated);
    });

    document.getElementById("dia4").addEventListener("change", ()=>{
        var dated = "2024-09-12";
        updtDay(dated);
    });

    function select(obj){
        tb_curso = ["adm","edi","inf","enf","tur"];
        for (let u = 0; u < tb_curso.length; u++) {
            if (obj != tb_curso[u]){
                document.getElementById(tb_curso[u]).checked = false;
            }
        }
    }

    function updtCurso(curso){
        document.getElementById("allCurso").value = curso;
    }

    document.getElementById("adm").addEventListener("change", ()=>{
        select("adm");
        var cursoDe = "Administração";
        updtCurso(cursoDe);
    });

    document.getElementById("edi").addEventListener("change", ()=>{
        select("edi");
        var cursoDe = "Edificações";
        updtCurso(cursoDe);
    });

    document.getElementById("inf").addEventListener("change", ()=>{
        select("inf");
        var cursoDe = "Informática";
        updtCurso(cursoDe);
    });

    document.getElementById("enf").addEventListener("change", ()=>{
        select("enf");
        var cursoDe = "Enfermagem";
        updtCurso(cursoDe);
    });

    document.getElementById("tur").addEventListener("change", ()=>{
        select("tur");
        var cursoDe = "Turismo";
        updtCurso(cursoDe);
    });
});