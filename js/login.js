document.getElementById("login-form").addEventListener("submit", function (event) {
  event.preventDefault(); // Evita la recarga de la página

  // Aquí puedes llamar a tu función para procesar el envío del formulario usando AJAX
  login();
});

function login() {
  // Aquí puedes escribir el código para enviar la solicitud AJAX al servidor y manejar la respuesta
  // Puedes usar la biblioteca XMLHttpRequest o utilizar bibliotecas de terceros como Axios o jQuery.ajax
  // Por ejemplo, con XMLHttpRequest:
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "login.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Aquí puedes manejar la respuesta del servidor
      console.log(xhr.responseText);
    }
  };
  xhr.send(new FormData(document.getElementById("login-form")));
}


function salir(event) {
  event.preventDefault();

  Swal.fire({
    title: '¿Estás seguro?',
    text: "Si cierras la sesión, perderás todos los cambios no guardados.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Cerrar sesión',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      // Aquí puedes realizar alguna acción adicional antes de redirigir
      window.location.href = "../salir.php";
    }
  });
}

