/////////////////////  Função de aparecer as informações  /////////////////////////////
function toggleInfo(buttonId) {
    const info = document.querySelector(`#${buttonId} .info`);
    const objItself = document.getElementById(buttonId);
    if (info.classList.contains('show')) {
        info.classList.remove('show');
        objItself.classList.remove('noIMG');
    } else {
        info.classList.add('show');
        objItself.classList.add('noIMG');
    }
}

/////////////////////  Valores de eventos agendados  /////////////////////////////
var eventosPlanejados = [
    [ "Segunda", "09/09", ///////////////////////////////////// Segunda ////////////////////////////////////////
        
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Autoridades, coordenadores, professores e alunos", // Nome
                    "css/media/logoetec.png", // Imagem
                    null, // Profissão
                ],
            ],
            "Abertura Solene", // Descrição
            "Auditório Principal (Quadra)", // Local
            "Todos Cursos Noturnos", // Cursos (Público Alvo)
            "19h00 às 21h15", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],
        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Julia Gare", // Nome
                    "forum_fotos/Palestrantes/julia.png", // Imagem
                    "Empresária e mentora de alta performance", // Profissão
                ],
            ],
            "Da Sala de Aula ao Mercado: A Jornada da Capacitação Técnica à Alta Performance Profissional", // Descrição
            "Auditório Principal (Quadra)", // Local
            "Todos Cursos Noturnos", // Cursos (Público Alvo)
            "21h15", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],
    ],

    [ "Terça", "10/09", ///////////////////////////////////// Terça ////////////////////////////////////////

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Rafael Oliveira Siqueira Carré", // Nome
                    "forum_fotos/Palestrantes/rafa.png", // Imagem
                    null, // Profissão
                ],
            ],
            "5 Princípios para desenvolver sua saúde mental", // Descrição
            "Auditório Principal (Quadra)", // Local
            "Enfermagem", // Cursos (Público Alvo)
            "14h00", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Marcelo Carvalho", // Nome
                    "forum_fotos/Palestrantes/marcelo.png", // Imagem
                    null, // Profissão
                ],
            ],
            "Desafios e Gestão Estratégicas na produção de edíficios", // Descrição
            "Auditório Principal (Quadra)", // Local
            "Edificações", // Cursos (Público Alvo)
            "20h00", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "", // Nome
                    "css/media/computer.png", // Imagem
                    null, // Profissão
                ],
            ],
            "Temática Curso de Informática", // Descrição
            "Auditório Alternativo (1° Andar)", // Local
            "Informática", // Cursos (Público Alvo)
            "20h00", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Fernando Gaspar", // Nome
                    "forum_fotos/Palestrantes/fernando.png", // Imagem
                    null, // Profissão
                ],
            ],
            "Estratégicas de aplicação financeira e Gestão Orçamento Eficaz", // Descrição
            "Auditório Principal (Quadra)", // Local
            "Administração", // Cursos (Público Alvo)
            "21h15", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],

    ],

    [ "Quarta", "11/09", ///////////////////////////////////// Quarta ////////////////////////////////////////

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Tadeu Fialho", // Nome
                    "forum_fotos/Palestrantes/tadeu.png", // Imagem
                    null, // Profissão
                ],
            ],
            "Impactos dos gestores egocêntrico e autoritários no clima organizacional e na performance empresarial", // Descrição
            "Auditório Principal (Quadra)", // Local
            "M-Tec ADM & M-Tec D.S.", // Cursos (Público Alvo)
            "14h00", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Andrezza Pinheira Anhaia", // Nome
                    "forum_fotos/Palestrantes/andrezza.png", // Imagem
                    null, // Profissão
                ],
            ],
            "Turismo e Conservação de Biodiversidade no Parque Estadual Serra do Mar - Núcleo Curucutu", // Descrição
            "Auditório Principal (Quadra)", // Local
            "Turismo Receptivo", // Cursos (Público Alvo)
            "20h00", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Comitê Gestor do Programa Mulher do CREA SP", // Nome
                    "forum_fotos/Palestrantes/creasp.png", // Imagem
                    null, // Profissão
                ],
            ],
            "Liderança em Cargos de Gestão na Construção Civil", // Descrição
            "Auditório Alternativo (1° Andar)", // Local
            "Edificações", // Cursos (Público Alvo)
            "20h00", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Marcelo de Melo Marcon", // Nome
                    "forum_fotos/Palestrantes/melo.png", // Imagem
                    "1° Tenente de Exército Brasileiro", // Profissão
                ],
            ],
            "A Segurança da Informação e a Proteção de Dados no dias Atuais", // Descrição
            "Auditório Principal (Quadra)", // Local
            "Informática", // Cursos (Público Alvo)
            "21h15", // Horário Começo
            2, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
        ],

    ],

    [ "Quinta", "12/09", ///////////////////////////////////// Quinta ////////////////////////////////////////

        [ // Informações do Evento abaixo: /////////////////// Evento
            [ // Pessoas
                [ // Informações
                    "Tadeu Fialho", // Nome
                    "forum_fotos/Palestrantes/tadeu.png", // Imagem
                    null, // Profissão
                ],
                [ // Informações
                    "Lucas Fialho", // Nome
                    "forum_fotos/Palestrantes/lucas.png", // Imagem
                    null, // Profissão
                ],
            ],
            "Ética e Comportamento Profissional: Construindo um Ambiente de Trabalho Harmonioso e Produtivo", // Descrição
            "Auditório Alternativo (1° Andar)", // Local
            "Administração", // Cursos (Público Alvo)
            "19h00", // Horário Começo
            1, // Quantidade de quadrados em uma linha (max 2) Exemplo: 1 = 100% | 2 = 50% da tela
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
            var tam = "Inside";
            for (let i2 = 0; i2 < eventosPlanejados[i].length; i2++) {
                if (Array.isArray(eventosPlanejados[i][i2])){
                    for (let i3 = 0; i3 < 4; i3++) {
                        if (eventosPlanejados[i][i2][i3] == null && i3 != 0){
                            eventosPlanejados[i][i2][i3] = "...";
                        }
                    }
                    if (eventosPlanejados[i][i2][5] == 2){
                        tam = "DuoInside";
                    }
                    var eventoDescrito = `
                    <div id="${tam}">
                        <div class="box">
                            <div class="BoxP-info" id="${eventosPlanejados[i][0]+uniqueCd}Pal">
                            </div>
                            <hr style="width: 95%;margin:10px">
                            <div class="info-item">
                                <img src="css/media/tema.png" id="IconI">
                                <h3 title="Descrição: ${eventosPlanejados[i][i2][1]}">${eventosPlanejados[i][i2][1]}</h3>
                            </div>
                            <div class="info-item">
                                <img src="css/media/local.png" id="IconI">
                                <h3 title="Local: ${eventosPlanejados[i][i2][2]}">${eventosPlanejados[i][i2][2]}</h3>
                            </div>
                            <div class="info-item">
                                <img src="css/media/evento.png" id="IconI">
                                <h3 title="Curso: ${eventosPlanejados[i][i2][3]}">${eventosPlanejados[i][i2][3]}</h3>
                            </div>
                            <div class="info-item">
                                <img src="css/media/relogio.png" id="IconI">
                                <h3 title="Horário: ${eventosPlanejados[i][i2][4]}">${eventosPlanejados[i][i2][4]}</h3>
                            </div>
                        </div>
                    </div>
                    `;
                    document.getElementById(eventosPlanejados[i][0]+"Info").insertAdjacentHTML('beforeend', eventoDescrito);

                    for (let i4 = 0; i4 < eventosPlanejados[i][i2][0].length; i4++) {
                        var removeProfissao = "";
                        var imagemPessoa = "Ppic";
                        for (let i5 = 0; i5 < eventosPlanejados[i][i2][0][i4].length; i5++) {
                            if (eventosPlanejados[i][i2][0][i4][0] == null && i5 == 0){ // nome texto de PlaceHolder
                                eventosPlanejados[i][i2][0][i4][0] = "Nome";
                            }
                            else if (eventosPlanejados[i][i2][0][i4][1] == null && i5 == 1){ // foto texto de PlaceHolder
                                eventosPlanejados[i][i2][0][i4][1] = "css/media/feliz.png";
                            }
                            else if (eventosPlanejados[i][i2][0][i4][1].substring(0,3) == "css" && i5 == 1){ // Foto design excluido
                                imagemPessoa = "Ppic2";
                                if (eventosPlanejados[i][i2][0][i4][1] == "css/media/logoetec.png"){
                                    imagemPessoa = "Ppic";
                                }
                            }
                            else if (eventosPlanejados[i][i2][0][i4][2] == null && i5 == 2){ // foto texto de PlaceHolder
                                eventosPlanejados[i][i2][0][i4][2] = "";
                                removeProfissao = "hidden";
                            }
                        }
                        var nmPalestrante = `
                                <div class="P-info">
                                    <img src="${eventosPlanejados[i][i2][0][i4][1]}" id="${imagemPessoa}">
                                    <span title="Nome: ${eventosPlanejados[i][i2][0][i4][0]}">${eventosPlanejados[i][i2][0][i4][0]}</span>
                                    <div class="info-item">
                                        <img src="css/media/profissao.png" id="IconI2" ${removeProfissao}>
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