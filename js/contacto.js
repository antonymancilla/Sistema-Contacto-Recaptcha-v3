function enviar() {

    let nombre =document.getElementById('nombre').value;
    let correo =document.getElementById('correo').value;
    let msj =document.getElementById('msj').value;
    let expresion = {
      nombre2: /^[a-zA-ZÀ-ÿ\s]{1,20}$/,
      correo2: /^[\w.-]+@[a-z.-]+\.[a-z]+$/,
      msj2: /^[a-zA-Z0-9À-ÿ?:-\s]+$/
    } 
   if (nombre == "") {
    Swal.fire({
        icon: 'error',    
        text: 'Introduce un nombre',
        confirmButtonText:'OK',
        timer:5000,
        timerProgressBar: true,
      });
      return false;
      
    }else if(!expresion.nombre2.test(nombre)){
        Swal.fire({
            icon: 'error',    
            text: 'Nombre no valido',
            confirmButtonText:'OK',
            timer:5000,
            timerProgressBar: true,
          });
        return false;
    }else if (correo == "") {
        Swal.fire({
            icon: 'error',        
            text: 'Introduce un correo',
            confirmButtonText:'OK',
            timer:5000,
            timerProgressBar: true,
          });
          return false;
        } 
    else if (!expresion.correo2.test(correo)) {
        Swal.fire({
            icon: 'error',        
            text: 'Correo no valido',
            confirmButtonText:'OK',
            timer:5000,
            timerProgressBar: true,
          });
          return false;
        }else if (msj == "") {
            Swal.fire({
                icon: 'error',
                text: 'Introduce un mensaje',
                confirmButtonText:'OK',
                timer:5000,
                timerProgressBar: true,
              });
              return false;
            }else if (!expresion.msj2.test(msj)) {
                Swal.fire({
                    icon: 'error',        
                    text: 'Mensaje no valido',
                    confirmButtonText:'OK',
                    timer:5000,
                    timerProgressBar: true,
                  });
                  return false;
                }
              else {
                    $.ajax({
                        type: 'POST',
                        url: 'contacto.php',
                        data: $('#form1').serialize(),
                        success: function(res) {
                            //$('#res').html(res);
                           //alert(res); 
                           Swal.fire(res)({
                            icon: 'success',
                            title: 'Hatchery',
                            text: 'Correo enviado',
                            confirmButtonText:'Continuar',
                               }); 
                      }
                        
                    });
                    return false;
    }      
}