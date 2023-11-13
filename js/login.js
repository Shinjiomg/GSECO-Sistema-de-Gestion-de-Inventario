

function autenthicated(){
    let user = document.getElementById('user').value?? '';
    let password = document.getElementById('user_password').value?? '';
    console.log(user, password)
    let credentials = {
        user,
        password
    }

    let datos = new FormData();

    datos.append('credentials', JSON.stringify(credentials) );
  

    $.ajax({
        url: "ajax/login.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            /* window.location.href = './stats.php'; */
           rol = JSON.parse(response);
           switch (rol) {
            case 0:
                Swal.fire({
                    icon: "error",
                    title: "Login",
                    text: "Credenciales invalidas",
                });
                break;
            case 1:
                window.location.href = './sales.php';
                break;
            case 2:
                window.location.href = './stats.php';
                break;
            default:
                Swal.fire({
                    icon: "error",
                    title: "Login",
                    text: "Credenciales invalidas",
                });
                break;
           }

        }
    });

}