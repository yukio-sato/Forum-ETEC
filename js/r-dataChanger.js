document.addEventListener("DOMContentLoaded", () => {
    var dtInput = document.getElementById("g-dia");
    document.getElementById("SelectD").addEventListener("change",() => {
        dtInput.value = document.getElementById("SelectD").value;
    });
});