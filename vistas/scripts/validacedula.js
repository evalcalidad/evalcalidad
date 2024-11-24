function validarCedula(cedula) 
{
    // Verificar que la cédula tenga 10 dígitos
    if (cedula.length !== 10) {
      return false;
    }
  
    // Obtener el dígito verificador
    var digitoVerificador = parseInt(cedula.charAt(9));
  
    // Calcular la suma de los dígitos pares
    var sumaPares = 0;
    for (var i = 0; i < 9; i += 2) {
      sumaPares += parseInt(cedula.charAt(i));
    }
  
    // Calcular la suma de los dígitos impares
    var sumaImpares = 0;
    for (var i = 1; i < 8; i += 2) {
      var digito = parseInt(cedula.charAt(i)) * 2;
      if (digito > 9) {
        digito -= 9;
      }
      sumaImpares += digito;
    }
  
    // Calcular el dígito verificador esperado
    var digitoVerificadorEsperado = (10 - (sumaPares + sumaImpares) % 10) % 10;
  
    // Comparar el dígito verificador calculado con el dígito verificador ingresado
    return digitoVerificador === digitoVerificadorEsperado;
  }
  

  function validador_cedula(cad)
  {
    var total = 0;
    var longitud = cad.length;
    var longcheck = longitud - 1;
    for (var i = 0; i < longcheck; i++) {
       if (i % 2 === 0) {
          var aux = cad.charAt(i) * 2;
          if (aux > 9) aux -= 9;
          total += aux;
       } else {
          total += parseInt(cad.charAt(i));
       }
    }
    total = total % 10 ? 10 - (total % 10) : 0;
    if (cad.charAt(longitud - 1) == total) 
      {
        return true;
       /*Swal.fire({
          position: "top-end",
          title: "CÉDULA VÁLIDA",
          html: `<p style="font-size: 1rem;">Cédula ingresada válida.</p>`,
          icon: "success",
          confirmButtonColor: "#049947",
          allowOutsideClick: false,
          showConfirmButton: false,
          timer: 1500,
       });*/
      alert('CEDULA CORRECTA')
    } else 
    {
      return false;
     // alert('CEDULA incorrecta')
       /*Swal.fire({
          position: "top-end",
          title: "CÉDULA NO VÁLIDA",
          html: `<p style="font-size: 1rem;">Ingrese una cédula válida.</p>`,
          icon: "error",
          confirmButtonColor: "#049947",
          allowOutsideClick: false,
          showConfirmButton: false,
          timer: 1500,
       });*/
    }

  }