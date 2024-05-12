if (document.querySelector('#formAcceso')) {
    let = formAcceso = document.querySelector('#formAcceso')
    //le agregamos el evento submit
    formAcceso.onsubmit =  (e) => {
        e.preventDefault()
        let strTxtUser = document.querySelector('#txtUser').value
        let strTxtPass = document.querySelector('#txtPass').value
        // if (strTxtUser == '' || strTxtPass == '') {
        //     notifi('Por favor', 'Escriba su usuario y password', 'error',)
        //     return false
        // } else {
            //enviar datos al controlador
        var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
        var ajaxUrl = base_url + 'Acceso/getAcceso'
        //creamos un objeto del formulario con los datos haciendo referencia a formData
        var formData = new FormData(formAcceso)
        //prepara los datos por ajax preparando el dom
        request.open('POST', ajaxUrl, true)
        //envio de datos del formulario que se almacena enla variable
        request.send(formData)
        let button = document.querySelector('.box-button')
        button.innerHTML = ''
        button.innerHTML = '<button type="submit" class="btn btn-primary btnIngresar disabled"><span class="spinner-border spinner-border-sm"></span>CARGANDO</button>'
        request.onreadystatechange =  () => {
            //validamos la respuesta del DOM
            // if (request.readyState != 4) return//no hacemos nada
            if (request.readyState = 4 || request.status == 200) {
                //convertir en json lo obtenido
                var objData = JSON.parse(request.responseText)
                //verfificamos si es verdadero la respuesta en json del controlador
                if (objData.status) {
                    window.location = base_url + 'home'
                } else {
                    notifi( objData.msg, 'error')
                    document.querySelector('#txtPass').value = ""
                    button.innerHTML = ''
                    button.innerHTML = '<button type="submit" class="btn btn-primary btnIngresar"> <i class="bx bx-radio-circle-marked"></i>INGRESAR</button>'
                }
            } else {
                notifi('Error en el proceso', 'error')
                button.innerHTML = ''
                button.innerHTML = '<button type="submit" class="btn btn-primary btnIngresar"> <i class="bx bx-radio-circle-marked"></i>INGRESAR</button>'
            }
            return false
        }
        // }
    }
}