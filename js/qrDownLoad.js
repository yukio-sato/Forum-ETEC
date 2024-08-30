async function down(nm,enter,curso,userInfo){
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();
    //pdf.text(`test:`, 10, 10); // text on pdf

    /* other method to generate a qr code with jspdf api
    const qrCodeCanvas = document.createElement('canvas');
    await QRCode.toCanvas(qrCodeCanvas, "https://api.qrserver.com/v1/create-qr-code/?data=${teste}&size=100x100");
    const qrCodeDataUrl = qrCodeCanvas.toDataURL('image/png');
    */

    pdf.addImage(`https://api.qrserver.com/v1/create-qr-code/?data=${userInfo}&size=100x100`, 'PNG', 0, 0, 40, 40); // the qr code itself
    pdf.text(`Nome: ${nm.substring(0,1).toUpperCase()+nm.substring(1)}`, 55, 10); // text on pdf
    pdf.text(`Entrou como: ${enter}`, 55, 15); // text on pdf
    if (curso != "Curso"){
        pdf.text(`Curso: ${curso.replace(",",", ")}`, 55, 20); // text on pdf
    }

    pdf.save('qrcode.pdf'); // download in your device
}