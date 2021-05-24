document.addEventListener("DOMContentLoaded", inicio);
let totalPaginas;

function inicio() {
    cargar();
    totalPaginas = 5;
    document.getElementById('select-accesos').addEventListener('change', cargar);
    document.getElementById('n-pagina-accesos').addEventListener('change', cargar);


    // Buttons
    document.getElementById('primera').addEventListener('click', primera);
    document.getElementById('anterior').addEventListener('click', anterior);
    document.getElementById('siguiente').addEventListener('click', siguiente);
    document.getElementById('ultima').addEventListener('click', ultima);
}

function cargar() {

    async function obtenerJSON(url) {
        let response = await fetch(url);
        if (response.ok && response.status === 200) {
            let json = await response.json();
            cargarJSON(json);
        } else if (response.status === 404)
            document.getElementById("tabla-accesos").innerHTML = '<div class="alert alert-danger mx-auto my-4 w-100" role="alert"><p class="m-0 ">Error 404: archivo de accesos no encontrado.</p></div>';
    }

    obtenerJSON("../cache/vars/adminAccess.json");
}


function cargarJSON(accesos) {

    let tabla = document.getElementById("tabla-accesos");

    let filasPorPagina = document.getElementById('select-accesos').value;
    totalPaginas = Math.ceil(accesos.length / filasPorPagina);

    let inputPagina = document.getElementById('n-pagina-accesos');

    let pagina = parseInt(inputPagina.value, 10);
    if (!Number.isSafeInteger(pagina, 10) || pagina < 1) {
        inputPagina.value = 1;
        pagina = 1;
    } else if (pagina > totalPaginas) {
        inputPagina.value = totalPaginas;
        pagina = totalPaginas;
    }

    let px = pagina.length * 9 + 40;
    inputPagina.style.width = px + 'px';
    inputPagina.value = pagina;

    let tope = pagina * filasPorPagina;

    // Limpiamos la tabla
    while (tabla.hasChildNodes()) tabla.removeChild(tabla.firstChild);


    let i = pagina * filasPorPagina - filasPorPagina
    console.log(
        "\n totalPaginas: " + totalPaginas +
        "\n pagina: " + pagina +
        "\n tope: " + tope +
        "\n i: " + i +
        "\n filasPorPagina: " + filasPorPagina +
        "\n " +
        "\n "
    );
    for (i; i < accesos.length && i < tope; i++) {

        const acceso = accesos[i];
        let fila = document.createElement("tr");

        let tds = [
            document.createElement('td'),
            document.createElement('td'),
            document.createElement('td'),
            document.createElement('td')
        ];

        tds[0].innerHTML = acceso.id;
        tds[1].innerHTML = acceso.admin;
        tds[2].innerHTML = acceso.timestamp;
        tds[3].innerHTML = acceso.pass;

        tds.forEach(td => {
            fila.appendChild(td);
        });

        tabla.appendChild(fila);
    }
}


function primera() {
    let n = document.getElementById('n-pagina-accesos');
    if (n.value > 1)
        n.value = 1;
    cargar();
}

function anterior() {
    let n = document.getElementById('n-pagina-accesos');
    if (n.value > 1)
        n.value--;
    cargar();
}

function siguiente() {
    let n = document.getElementById('n-pagina-accesos');
    console.log('siguiente')
    if (totalPaginas > n.value)
        n.value++;
    cargar();
}

function ultima() {
    let n = document.getElementById('n-pagina-accesos');
    if (totalPaginas > n.value)
        n.value = totalPaginas;
    cargar();
}