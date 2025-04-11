document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(contactForm);
        
        fetch('procesar.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          document.getElementById('respuesta').innerHTML = data.mensaje;
        })
        .catch(error => {
          document.getElementById('respuesta').innerHTML = 'Error al enviar el mensaje';
        });
      });
    }
  });