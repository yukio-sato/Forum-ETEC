    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();
    async function down(nm,enter,curso,userInfo,x,y){
        //pdf.text(`test:`, 10, 10); // text on pdf
    
        /* other method to generate a qr code with jspdf api
        const qrCodeCanvas = document.createElement('canvas');
        await QRCode.toCanvas(qrCodeCanvas, "https://api.qrserver.com/v1/create-qr-code/?data=${teste}&size=100x100");
        const qrCodeDataUrl = qrCodeCanvas.toDataURL('image/png');
        */
        let x2 = 33 //+(10*(x-1))
        let y2 = 18+(28*(y-1))
        pdf.addImage(`https://api.qrserver.com/v1/create-qr-code/?data=${userInfo}&size=100x100`, 'PNG', 8, 12+(50*(y-1)), 20, 20); // the qr code itself
    
        pdf.text(`Nome: ${nm.substring(0,1).toUpperCase()+nm.substring(1)}`, x2, y2); // text on pdf
        pdf.text(`Entrou como: ${enter}`, x2, y2+5); // text on pdf
        if (curso != "Curso" && curso != ""){
            pdf.text(`Curso: ${curso.replace(",",", ")}`, x2, y2+10); // text on pdf
        }
    }
    function save(){
        pdf.save('qrcode.pdf'); // download in your device
    }