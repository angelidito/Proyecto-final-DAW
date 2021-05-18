document.addEventListener("DOMContentLoaded", inicio);


function inicio() {
    cargar();
    document.getElementById('select-accesos').addEventListener('change', cargar);
}

function cargar() {

    obtenerJSON("../cache/vars/adminAccess.json");

    async function obtenerJSON(url) {
        let response = await fetch(url);
        if (response.ok && response.status === 200) {
            let json = await response.json();
            cargarJSON(json);
        } else if (response.status === 404)
            document.getElementById("tabla-accesos").innerHTML = "Error 404: archivo no enontrado.";
    }
}


function cargarJSON(accesos) {
    let tabla = document.getElementById("tabla-accesos");
    let filas = [];
    for (let i = 0; i < accesos.length; i++) {
        const acceso = accesos[i];
        let fila = document.createElement("tr");

        let id = document.createElement('td');
        id.innerHTML = acceso.id;
        let usuario = document.createElement('td');
        usuario.innerHTML = acceso.admin;
        let fecha = document.createElement('td');
        fecha.innerHTML = acceso.timestamp;
        let contraseña = document.createElement('td');
        contraseña.innerHTML = acceso.pass;

    }
    tabla.appendChild(fila);

}