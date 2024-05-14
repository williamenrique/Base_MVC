if (document.querySelector(".formProfile")){
    var formProfile = document.querySelector('.formProfile')
    formProfile.onsubmit = (e) => {
        e.preventDefault()
        //nos referimos a ese elmento aque lo hemos dado click
        //creamos un objeto del formulario con los datos haciendo referencia a formData
        let formData = new FormData(formProfile)
        //creamos el objeto para os navegadores
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP')
        var ajaxUrl = base_url + "Usuario/updateData"
        //abrimos la conexion y enviamos los parametros para la peticion
        request.open("POST", ajaxUrl, true)
        request.send(formData)
        //obtenemos los resultados y evaluamos
        request.onreadystatechange = () => {
            if (request.readyState == 4 && request.status == 200) {
                //obtenemos los datos y convertimos en JSON
                let objData = JSON.parse(request.responseText)
                if (objData.status){
                    notifi(objData.msg,'success')
                }
            }
        }
    }
}
if(document.querySelector('.formImg')){
    /**********************************
 * cargar la imagen para perfil
 ********************************/
    let file = document.querySelector('#file')
    let formData = new FormData()
    if (document.querySelector('.search')) {
        let search = document.querySelector('.search')
        search.addEventListener('click', () => {
            document.querySelector('#file').click()
            file.value = ""
            createClearFormData()
        })
    }

    file.addEventListener('change', (e) => {
        /** una sola imagen enviado a base de datos
         * 	msj.innerText = file.files[0].name
         */
        let thumbnail = document.createElement('div') // generar un elemento
        thumbnail.classList.add('thumbnail', 0) // asignarle una clase y el id
        thumbnail.dataset.id = 0  //crear un atributo con dat.set y le asignamos el id
        thumbnail.setAttribute('style', `background-image : url(${URL.createObjectURL(file.files[0])})`)
        document.getElementById('preview-images').appendChild(thumbnail)
        createClose(0)

        // for (let i = 0 i < file.length i++) {
        // 	let thumbnail_id = Math.floor(Math.random() = 30000) + '_' + Date.now()
        // 	console.log(thumbnail_id)
        // }
    })

    const createClearFormData = () => {
        // recorrer el formaData
        for (let key of formData.keys()) {
            //llamamos el formadata y le pasamos el delete con el key
            formData.delete(key)
            console.log(key)
        }
        // quitar todos los thumbnail
        document.querySelectorAll('.thumbnail').forEach((thumbnail) => {
            thumbnail.remove()
        })
    }
    // funcion para clrear el boton de cerrar la imagen
    const createClose = (thumbnail_id) => {
        let closeButton = document.createElement('div')
        closeButton.classList.add('close-button')
        // closeButton.innerText = 'x'
        // despues de crear la funcion para cerrar
        document.getElementsByClassName(thumbnail_id)[0].appendChild(closeButton)
    }
    // agregamos al body y action de escucha al momento de cancelar la imagen
    document.body.addEventListener('click', function (e) {
        if (e.target.classList.contains('close-button')) {
            e.target.parentNode.remove()
            formData.delete(e.target.parentNode.dataset.id)
            file.value = ""
        }
    })
    /***********************
     * funcion para subir 
     * imagen al servidor
     **********************/
    let btnUpImg = document.querySelector('.btnUpImg')
    let formImg = document.querySelector('.formImg')
    btnUpImg.addEventListener('click', () => {
        let ajaxUrl = base_url + 'Usuario/subirImagen'
        const formdata = new FormData(formImg)
        formdata.append('accion', 'event')
        fetch(ajaxUrl, {
            method: 'POST',
            body: formdata,
        })
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                if (data.status) {
                    notifi(data.msg, 'success')
                } else {
                    notifi(data.msg, 'error')
                }
            })
            .catch((err) => {
                console.log(err)
            })
    })
}