document.addEventListener('DOMContentLoaded', function() {
    const pantalla = document.getElementById('pantalla');
    const botones = document.querySelectorAll('.btn');
    
    botones.forEach(boton => {
      boton.addEventListener('click', function() {
        const valor = this.value;
        
        if (valor === 'C') {
          // Limpiar pantalla
          pantalla.value = '';
        } else if (valor === '=') {
          try {
            // Calcular resultado
            const resultado = eval(pantalla.value);
            pantalla.value = resultado;
          } catch (error) {
            pantalla.value = 'Error';
          }
        } else {
          // Agregar valor a la pantalla
          pantalla.value += valor;
        }
      });
    });
  });