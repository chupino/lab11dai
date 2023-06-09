var displayTable = 'flex';
var sentidoOrden = 'asc';

function sortList(column) {

    let filas = document.getElementsByClassName('products-row');

    let elementos = {};

    for(let i = 0; i < filas.length; i++) {
        let item = filas.item(i).getElementsByClassName(column);
        let value = item.item(0).getElementsByClassName('value-row').item(0).textContent;
        elementos[value] = filas.item(i);
    }

    let orden;

    if(sentidoOrden == 'asc') {
        orden = Object.entries(elementos).sort();
        sentidoOrden = 'desc';
    }else {
        orden = Object.entries(elementos).reverse();
        sentidoOrden = 'asc';
    }

    console.log(orden);

}

/**
 * Función que busca coincidencias con respecto a un campo en el
 * combo box, modificaciones necesarias para búsqueda en tabla:
 * 1. Establecer las opciones en el select de la sección "campos-búsqueda"
 *    section('campos-búsqueda')
 *        <option value="campo1">Campo 1</option>
 *        <option value="campo2">Campo 2</option>
 *        <option value="campo3">Campo 3</option>
 *    endsection
 */
function search() {
    let inputBusqueda = document.getElementById('barraBusqueda').value;
    let campoBusqueda = document.getElementById('campoBusqueda').value;

    let filas = document.getElementsByClassName('products-row');

    for(let i = 0; i < filas.length; i++) {
        let item = filas.item(i).getElementsByClassName(campoBusqueda);
        let value = item.item(0).getElementsByClassName('value-row').item(0).textContent;

        if(value.toLowerCase().includes(inputBusqueda.toLowerCase())) {
            filas.item(i).style.display = displayTable;
        } else {
            filas.item(i).style.display = 'none';
        }
    }
}

function validateRecepUser(e, type) {
    e.preventDefault();
    let contra1 = document.getElementById('contrasena').value;
    let contra2 = document.getElementById('contrasena-confirm').value;

    if(contra1 == "" && contra2 == "" && type == 'update') {
        document.querySelector('.form-updateUser').submit();
    } else if(contra1 != contra2) {
        alert('Contraseñas no son iguales');
    } else if(contra1.length < 8) {
        alert('Contraseña muy corta');
    } else {
        document.querySelector('.form-updateUser').submit();
    }
}

function showEditRecepUser(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-editUser-store');
    let btn2 = document.getElementById('btn-editUser-cancel');
    let btn3 = document.getElementById('btn-editUser');
    let contraConfirm = document.getElementById('recepUpdate-contraConfirm');
    let campos = document.querySelectorAll(".form-updateUser .card-content .card-group input");
    campos.forEach((campo) => {
        campo.removeAttribute('disabled');
    })

    btn3.style.display = 'none';
    btn1.style.display = 'initial';
    btn2.style.display = 'initial';
    contraConfirm.style.display = 'flex';
}
function showEditRecepUserDisable(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-editUser-store');
    let btn2 = document.getElementById('btn-editUser-cancel');
    let btn3 = document.getElementById('btn-editUser');
    let contraConfirm = document.getElementById('recepUpdate-contraConfirm');
    let campos = document.querySelectorAll(".form-updateUser .card-content .card-group input");
    campos.forEach((campo) => {
        campo.setAttribute('disabled', true);
    })

    btn3.style.display = 'initial';
    btn1.style.display = 'none';
    btn2.style.display = 'none';
    contraConfirm.style.display = 'none';
}

function showEditRecep(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-edit-store');
    let btn2 = document.getElementById('btn-edit-cancel');
    let btn3 = document.getElementById('btn-edit');
    let campos = document.querySelectorAll(".form-update .card-content .card-group .form-input");
    campos.forEach((campo) => {
        campo.removeAttribute('disabled');
    })

    btn3.style.display = 'none';
    btn1.style.display = 'initial';
    btn2.style.display = 'initial';
}
function showEditRecepDisable(e) {
    e.preventDefault();
    let btn1 = document.getElementById('btn-edit-store');
    let btn2 = document.getElementById('btn-edit-cancel');
    let btn3 = document.getElementById('btn-edit');
    let campos = document.querySelectorAll(".form-update .card-content .card-group .form-input");
    campos.forEach((campo) => {
        campo.setAttribute('disabled', true);
    })

    btn3.style.display = 'initial';
    btn1.style.display = 'none';
    btn2.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', () => {

    let filter = document.querySelector(".jsFilter");
    if (filter !== null) {
        filter.addEventListener("click", function () {
            document.querySelector(".filter-menu").classList.toggle("active");
        });
    }
    let grid = document.querySelector(".grid");
    if (grid !== null) {
        grid.addEventListener("click", function () {
            document.querySelector(".list").classList.remove("active");
            document.querySelector(".grid").classList.add("active");
            document.querySelector(".products-area-wrapper").classList.add("gridView");
            document.querySelector(".products-area-wrapper").classList.remove("tableView");
            displayTable = 'grid';
            search()
        });
    }
    let list = document.querySelector(".list");
    if (list !== null) {
        list.addEventListener("click", function () {
            document.querySelector(".list").classList.add("active");
            document.querySelector(".grid").classList.remove("active");
            document.querySelector(".products-area-wrapper").classList.remove("gridView");
            document.querySelector(".products-area-wrapper").classList.add("tableView");
            displayTable = 'flex';
            search()
        });
    }

    var modeSwitch = document.querySelector('.mode-switch');
    modeSwitch.addEventListener('click', function () {
        document.documentElement.classList.toggle('light');
        modeSwitch.classList.toggle('active');
    });
})
