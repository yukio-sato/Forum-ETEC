let pass = "forumEtecRoot";
document.addEventListener("submit", (e)=>{
    let pswd = document.getElementById("pswd").value;
    if (pswd != pass){
        e.preventDefault();
    }
});

document.addEventListener("DOMContentLoaded", ()=>{
    document.getElementById("visibling").addEventListener("click", () => {
        let isVisibile = document.getElementById("pswd").getAttribute("type")
        if (isVisibile == "password"){
            document.getElementById("pswd").setAttribute("type","text");
            document.getElementById("visibling").textContent = "⊙";
        }
        else{
            document.getElementById("pswd").setAttribute("type","password");
            document.getElementById("visibling").textContent = "⊘";
        }
    });
})