/////////////////////  Função de aparecer as informações  /////////////////////////////
function toggleInfo(buttonId) {
    const info = document.querySelector(`#${buttonId} .info`);
    if (info.classList.contains('show')) {
        info.classList.remove('show');
    } else {
        info.classList.add('show');
    }
}

/////////////////////  Valores de eventos agendados  /////////////////////////////
var eventosPlanejados = [
    [ "Segunda", "09/09", ///////////////////////////////////// Segunda ////////////////////////////////////////
        [ // Evento
            [ // Pessoas
                [ // Informações
                    "Teste", // Nome
                    "css/media/email.png", // Imagem
                    null, // Profissão
                ],
                [ // Informações
                    null, // Nome
                    null, // Imagem
                    null, // Profissão
                ],
            ],
            "Auditório Principal (Quadra)", // Local
            "Período noturno", // Horário
            "Avertura Solene e palestra global.", // Descrição
        ]
    ],

    [ "Terça", "10/09", ///////////////////////////////////// Terça ////////////////////////////////////////
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // pessoas
                [ // informações
                    null, // nome
                    null, // imagem
                    null, // profissão
                ],
            ],
            "Auditório Principal (Quadra)",
            "Período tarde",
            "Enfermagem",
        ],
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // pessoas
                [ // informações
                    null, // nome
                    null, // imagem
                    null, // profissão
                ],
            ],
            "Auditório Principal (Quadra)",
            "Período noturno",
            "Edificações / Administração",
        ],
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // pessoas
                [ // informações
                    null, // nome
                    null, // imagem
                    null, // profissão
                ],
            ],
            "Auditório Alternativo (1° Andar)",
            null,
            "Informática",
        ],
    ],

    [ "Quarta", "11/09", ///////////////////////////////////// Quarta ////////////////////////////////////////
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // pessoas
                [ // informações
                    null, // nome
                    null, // imagem
                    null, // profissão
                ],
            ],
            "Auditório Principal (Quadra)",
            "Período tarde",
            "Ensino Médio",
        ],
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // pessoas
                [ // informações
                    null, // nome
                    null, // imagem
                    null, // profissão
                ],
            ],
            "Auditório Principal (Quadra)",
            "Período noturno",
            "Turismo / Informática",
        ],
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // pessoas
                [ // informações
                    null, // nome
                    null, // imagem
                    null, // profissão
                ],
            ],
            "Auditório Alternativo (1° Andar)",
            null,
            "Edificações",
        ],
    ],

    [ "Quinta", "12/09", ///////////////////////////////////// Quinta ////////////////////////////////////////
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // pessoas
                [ // informações
                    null, // nome
                    null, // imagem
                    null, // profissão
                ],
            ],
            "Auditório Alternativo (1° Andar)",
            null,
            "Administração",
        ],
    ],

    [ "Sexta", "13/09", ///////////////////////////////////// Sexta ////////////////////////////////////////
        [ // Informações do Evento abaixo: /////////////////// Evento
        ],
    ],
];
document.addEventListener("DOMContentLoaded", () => {
    var UDP = 0; // Ultimo dia Planejado
    var lastDayFound = false; // Variavel que bloqueia a alteração do valor caso seja chamado novamente
    for (let ind = eventosPlanejados.length-1; ind >= 0; ind--) {
        if (eventosPlanejados[ind][2] != null && lastDayFound == false){
            lastDayFound = true;
            UDP = ind-1;
        }
    }
    for (let i = 0; i < eventosPlanejados.length; i++) {
        if (eventosPlanejados[i][2] != null
        && eventosPlanejados[i][2].length > 0){
            var diaSemana;
            if (i != UDP){
                diaSemana = `
                <button id="${eventosPlanejados[i][0]}" class="ButtonBox eventPlanned" onclick="toggleInfo(id)">
                    <span id="${eventosPlanejados[i][0]}Text">${eventosPlanejados[i][0]}-Feira (${eventosPlanejados[i][1]})</span>
                    <div id="${eventosPlanejados[i][0]}Info" class="info">
                    </div>
                </button>
                `;
            }
            else{
                diaSemana = `
                <button id="${eventosPlanejados[i][0]}" class="LastButtonBox eventPlanned" onclick="toggleInfo(id)">
                    <span id="${eventosPlanejados[i][0]}Text">${eventosPlanejados[i][0]}-Feira (${eventosPlanejados[i][1]})</span>
                    <div id="${eventosPlanejados[i][0]}Info" class="info">
                    </div>
                </button>
                `;
            }
            document.getElementById("RedBox").insertAdjacentHTML('beforeend', diaSemana);
            var uniqueCd = 0;
            for (let i2 = 0; i2 < eventosPlanejados[i].length; i2++) {
                if (Array.isArray(eventosPlanejados[i][i2])){
                    for (let i3 = 0; i3 < 4; i3++) {
                        if (eventosPlanejados[i][i2][i3] == null && i3 != 0){
                            eventosPlanejados[i][i2][i3] = "...";
                        }
                    }
                    
                    var eventoDescrito = `
                    <div id="inside1">
                        <div class="box">
                            <div class="BoxP-info" id="${eventosPlanejados[i][0]+uniqueCd}Pal">
                            </div>
                            <hr style="width: 99%;margin:0">
                            <div class="info-item">
                                <img src="css/media/tema.png" id="IconI">
                                <h3 title="Tema: ${eventosPlanejados[i][i2][3]}">${eventosPlanejados[i][i2][3]}</h3>
                            </div>
                            <div class="info-item">
                                <img src="css/media/local.png" id="IconI">
                                <span title="Local: ${eventosPlanejados[i][i2][1]}">${eventosPlanejados[i][i2][1]}</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/relogio.png" id="IconI">
                                <span title="Horário: ${eventosPlanejados[i][i2][2]}">${eventosPlanejados[i][i2][2]}</span>
                            </div>
                        </div>
                    </div>
                    `;
                    document.getElementById(eventosPlanejados[i][0]+"Info").insertAdjacentHTML('beforeend', eventoDescrito);

                    for (let i4 = 0; i4 < eventosPlanejados[i][i2][0].length; i4++) {
                        for (let i5 = 0; i5 < eventosPlanejados[i][i2][0][i4].length; i5++) {
                            if (eventosPlanejados[i][i2][0][i4][0] == null && i5 == 0){ // nome texto de PlaceHolder
                                eventosPlanejados[i][i2][0][i4][0] = "Nome";
                            }
                            else if (eventosPlanejados[i][i2][0][i4][1] == null && i5 == 1){ // foto texto de PlaceHolder
                                eventosPlanejados[i][i2][0][i4][1] = "css/media/feliz.png";
                            }
                            else if (eventosPlanejados[i][i2][0][i4][2] == null && i5 == 2){ // foto texto de PlaceHolder
                                eventosPlanejados[i][i2][0][i4][2] = "Nada";
                            }
                        }
                        var nmPalestrante = `
                                <div class="P-info">
                                        <img src="${eventosPlanejados[i][i2][0][i4][1]}" id="Ppic">
                                        <span title="Nome: ${eventosPlanejados[i][i2][0][i4][0]}">${eventosPlanejados[i][i2][0][i4][0]}</span>
                                        <div class="info-item">
                                        <img src="css/media/profissao.png" id="IconI">
                                        <span title="Profissão: ${eventosPlanejados[i][i2][0][i4][2]}">${eventosPlanejados[i][i2][0][i4][2]}</span>
                                    </div>
                                </div>
                            `;
                            document.getElementById(eventosPlanejados[i][0]+uniqueCd+"Pal").insertAdjacentHTML('beforeend', nmPalestrante);
                    }
                    uniqueCd += 1;
                }
            }
        }
    }
})