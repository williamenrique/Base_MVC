soloNumeros = (e) => {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
soloLetras = (e) => {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

notifi = (data, icon) => {
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })
        Toast.fire({
            icon: icon,
            title: data
        })
    })
}

alerta = (title, text) => {
    Swal.fire({
        icon: "error",
        title: title,
        text: text
    })
}

/*********************************
 * funcion nav ocultar  si existe   *
 * *******************************/
if (document.querySelector('.show')){
    let show = document.querySelector('.show')
    let section_nav = document.querySelector('.section-nav')
    let main = document.querySelector('.main')
    show.addEventListener('click', () => {
        section_nav.classList.toggle('nav-active')
        main.classList.toggle('nav-active')
        show.classList.toggle('arrow')
        if (show.classList.contains('arrow')) {
            let saveNav = localStorage.setItem('nav', 'true')
        } else {
            let saveNav = localStorage.setItem('nav', 'false')
        }
    })
    // acceder al elemento localstore
    if (localStorage.getItem("nav") === 'true') {
        section_nav.classList.add('nav-active')
        main.classList.add('nav-active')
        show.classList.add('arrow')
    } else {
        section_nav.classList.remove('nav-active')
        main.classList.remove('nav-active')
        show.classList.remove('arrow')
    }
    let show_menu = document.querySelector('.show_menu')
    show_menu.addEventListener('click', () => {
        let section_nav = document.querySelector('.section-nav')
        let main = document.querySelector('.main')
        let show = document.querySelector('.show')
        section_nav.classList.toggle('nav-active')
        main.classList.toggle('nav-active')
        // show_menu.classList.toggle('arrow')
        show.classList.toggle('arrow')
    })
    /*********************************
     * Funciones desplegable  del menu*
     * *******************************/
    let listElements = document.querySelectorAll('.button_click')
    
    listElements.forEach(listElement => {
        listElement.addEventListener('click', () => {
            listElement.classList.toggle('arrow')
            let height = 0
            let menu = listElement.nextElementSibling //obtener el hermano adyacente
            // evaluamos el alto de los submenu dinamicamnete
            if (menu.clientHeight == 0) {
                height = menu.scrollHeight
            }
            // cambiar el valor del height
            menu.style.height = `${height}px`
        })
    })
}