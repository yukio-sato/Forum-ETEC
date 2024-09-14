document.addEventListener("DOMContentLoaded", () => {
    var dtInput = document.getElementById("g-conta");
    document.getElementById("SelectD").addEventListener("change",() => {
        dtInput.value = document.getElementById("SelectD").value;
    });
});