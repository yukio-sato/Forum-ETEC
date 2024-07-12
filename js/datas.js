function toggleInfo(buttonId) {
    const info = document.querySelector(`#${buttonId} .info`);
    const buttonText = document.querySelector(`#${buttonId} #buttonText`);

    if (info.classList.contains('show')) {
        info.classList.remove('show');
        buttonText.textContent = "Tanana-Feira (XX/XX)";
    } else {
        info.classList.add('show');
        buttonText.textContent = "Nome do Curso (XX/XX)";
    }
}

/*
document.addEventListener("DOMContentLoaded", () => {
    var teste = `<button id="aaaaaa" class="ButtonBox" onclick="toggleInfo(id)">
                <span id="buttonText1">utilizando js (XX/XX)</span>
                <div id="info1" class="info">
                    <div id="inside1">
                        <div class="box">
                            <div class="info-item">
                                <img src="css/media/feliz.png" id="IconI">
                                <span>Nome Pessoa</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/profissao.png" id="IconI">
                                <span>Profissão Pessoa</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/local.png" id="IconI">
                                <span>Local Evento</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/relogio.png" id="IconI">
                                <span>XX:XXh</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/tema.png" id="IconI">
                                <h3>Descrição evento, pode ser bem grande</h3>
                            </div>
                        </div>
                    </div>
                    <div id="inside2">
                        <div class="box" id="0">
                            <div class="info-item">
                                <img src="css/media/evento.png" id="IconI">
                                <span>Nome Outro Evento</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/local.png" id="IconI">
                                <span>Local Evento</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/relogio.png" id="IconI">
                                <span>XX:XXh</span>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
    `;
    document.getElementById("RedBox").insertAdjacentHTML('beforeend', teste);

})
*/