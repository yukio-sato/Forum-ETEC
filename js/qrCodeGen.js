    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();
    async function down(nm,enter,userInfo,x,y){
        // Biblioteca = https://rawgit.com/MrRio/jsPDF/master/docs/jsPDF.html
        //pdf.text(`test:`, 10, 10); // text on pdf
    
        /* other method to generate a qr code with jspdf api
        const qrCodeCanvas = document.createElement('canvas');
        await QRCode.toCanvas(qrCodeCanvas, "https://api.qrserver.com/v1/create-qr-code/?data=${teste}&size=100x100");
        const qrCodeDataUrl = qrCodeCanvas.toDataURL('image/png');
        */
        let xBase = 67;
        let yBase = 25;
        let x2 = 32+(xBase*(x-1))
        let y2 = 20+(yBase*(y-1))
        pdf.addImage(`https://api.qrserver.com/v1/create-qr-code/?data=${userInfo}&size=100x100`, 'PNG', 10+(xBase*(x-1)), 12+(yBase*(y-1)), 20, 20); // the qr code itself

        pdf.setFontSize(10);

        pdf.text(`${nm.substring(0,1).toUpperCase()+nm.substring(1,19)}`, x2, y2); // text on pdf
        if (enter == "CON"){
            pdf.text(`Convidado`, x2, y2+5); // text on pdf
        }
        else if (enter == "ALU"){
            pdf.text(`Aluno`, x2, y2+5); // text on pdf
        }
    }
    function save(){
        pdf.save('qrcode.pdf'); // download in your device
    }