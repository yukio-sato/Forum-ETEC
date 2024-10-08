document.addEventListener("DOMContentLoaded", () => {
    
    const video = document.getElementById('qr-video');
    const canvas = document.getElementById('qr-canvas');
    const ctx = canvas.getContext('2d');
    let qrFound = false; 
    
    const constraints = {
      video: {
        facingMode: "environment" // "user" é a câmera de "self"
      }
    };
    
    navigator.mediaDevices.getUserMedia(constraints)
      .then((stream) => {
        video.srcObject = stream;
        video.setAttribute('playsinline', true);
        video.play();
        requestAnimationFrame(tick);
      });
    
    function tick() {
      if (!qrFound && video.readyState === video.HAVE_ENOUGH_DATA) {
        canvas.height = video.videoHeight;
        canvas.width = video.videoWidth;
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: 'dontInvert',
        });
        if (code) {
          if (code.data) {
            qrFound = true;
    
            window.location.href = code.data;
          } else {
            requestAnimationFrame(tick);
          }
        }
      }
      requestAnimationFrame(tick);
    }
});