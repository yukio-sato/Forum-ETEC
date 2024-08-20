// Coisas para não repetir denovo e denovo
var setaUp = "css/media/subir.png";
var setaDown = "css/media/descer.png";

document.addEventListener("DOMContentLoaded", () => {
    // Obter elementos
    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const captionText = document.getElementById("caption");
    const close = document.getElementsByClassName("close")[0];
    const next = document.getElementById("next");
    const prev = document.getElementById("prev");
    const images = document.querySelectorAll("#secundarias .scnd");
    let currentIndex = 0;

    // Função para abrir o modal
    images.forEach((image, index) => {
        image.addEventListener("click", function () {
            modal.style.display = "block";
            modalImage.src = this.src;
            captionText.innerHTML = this.alt;
            currentIndex = index;
        });
    });

    // Função para fechar o modal
    close.onclick = function () {
        modal.style.display = "none";
    }

    // Função para mostrar a próxima imagem
    next.onclick = function () {
        currentIndex = (currentIndex + 1) % images.length;
        modalImage.src = images[currentIndex].src;
        captionText.innerHTML = images[currentIndex].alt;
    }

    // Função para mostrar a imagem anterior
    prev.onclick = function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        modalImage.src = images[currentIndex].src;
        captionText.innerHTML = images[currentIndex].alt;
    }

    // Fechar o modal ao clicar fora da imagem
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    ///////////////////////////////////////////// Administração ///////////////////////////////////////////////////////
    // Botão que alterna entre expandir e colapsar
    document.getElementById("toggleImage").addEventListener("click", function() {
        const dentro = document.getElementById("dentro");

        if (dentro.style.display === "block") {
            dentro.style.display = "none"; 
            this.src = setaDown;
        } else {
            dentro.style.display = "block"; 
            this.src = setaUp; 
        }
    });

    ///////////////////////////////////////////// Edificações ///////////////////////////////////////////////////////
    // Botão que alterna entre expandir e colapsar
    document.getElementById("toggleImageEDF").addEventListener("click", function() {
        const dentro = document.getElementById("dentroEDF");
        const isExpanded = dentro.style.display === "block";

        if (isExpanded) {
            dentro.style.display = "none";
            this.src = setaDown; 
        } else {
            dentro.style.display = "block";
            this.src = setaUp; 
        }
    });

    ///////////////////////////////////////////// Enfermagem ///////////////////////////////////////////////////////
    // Botão que alterna entre expandir e colapsar
    document.getElementById("toggleImageENF").addEventListener("click", function() {
        const dentro = document.getElementById("dentroENF");
        const isExpanded = dentro.style.display === "block";

        if (isExpanded) {
            dentro.style.display = "none";
            this.src = setaDown; 
        } else {
            dentro.style.display = "block";
            this.src = setaUp; 
        }
    });

    ///////////////////////////////////////////// Informática ///////////////////////////////////////////////////////
    // Botão que alterna entre expandir e colapsar
    document.getElementById("toggleImageTI").addEventListener("click", function() {
        const dentro = document.getElementById("dentroTI");
        const isExpanded = dentro.style.display === "block";

        if (isExpanded) {
            dentro.style.display = "none";
            this.src = setaDown; 
        } else {
            dentro.style.display = "block";
            this.src = setaUp; 
        }
    });

    ///////////////////////////////////////////// Turismo ///////////////////////////////////////////////////////
    // Botão que alterna entre expandir e colapsar
    document.getElementById("toggleImageTRSM").addEventListener("click", function() {
        const dentro = document.getElementById("dentroTRSM");
        const isExpanded = dentro.style.display === "block";

        if (isExpanded) {
            dentro.style.display = "none";
            this.src = setaDown; 
        } else {
            dentro.style.display = "block";
            this.src = setaUp; 
        }
    });
});