
function openModal(modalId) {
    document.getElementById(modalId).style.display = "flex";
    document.body.classList.add("modal-open");
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
    document.body.classList.remove("modal-open");
}

window.onclick = function (event) {
    
    if (event.target.classList.contains("modal")) {
        closeModal(event.target.id);
    }
}



// *********************************codigo para roles*********************************


function openAsignarRolesModal(idUsuario) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rol/nuevoRol.php?idUsuario=' + idUsuario, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalAsignarRoles_' + idUsuario); 
        }
    };
    xhr.send();
}


//modal de detalles
function openDetallesRolModal(idRol) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rol/detallesRol.php?idRol=' + idRol, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalDetallesRoles_' + idRol); // 
        }
    };
    xhr.send();
}


//modal de modificacion
function openModificarRolModal(idRol) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rol/modificarRol.php?idRol=' + idRol, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalModificarRoles_' + idRol); 
        }
    };
    xhr.send();
}


//modal de eliminar
function openEliminarRolModal(idRol) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rol/eliminarRol.php?idRol=' + idRol, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalEliminarRoles_' + idRol); 
        }
    };
    xhr.send();
}


// *********************************codigo para usuarios*********************************
//modal de registro
function openRegistroUsuariosModal() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/usuario/nuevoUsuario.html', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalUsuarios'); 
        }
    };
    xhr.send();
}



//modal de detalles
function openDetallesUsuariosModal(idUsuario) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/usuario/detallesUsuario.php?idUsuario=' + idUsuario, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalDetallesUsuarios_' + idUsuario); // 
        }
    };
    xhr.send();
}


//modal de modificacion
function openModificarUsuariosModal(idUsuario) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/usuario/modificarUsuario.php?idUsuario=' + idUsuario, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalModificarUsuarios_' + idUsuario); 
        }
    };
    xhr.send();
}


//modal de eliminar
function openEliminarUsuariosModal(idUsuario) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/usuario/eliminarUsuario.php?idUsuario=' + idUsuario, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalEliminarUsuarios_' + idUsuario); 
        }
    };
    xhr.send();
}


//modal de baja
function openBajaUsuariosModal(idUsuario) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/usuario/bajaUsuario.php?idUsuario=' + idUsuario, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalBajaUsuarios_' + idUsuario); 
        }
    };
    xhr.send();
}

//modal de alta
function openAltaUsuariosModal(idUsuario) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/usuario/altaUsuario.php?idUsuario=' + idUsuario, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalAltaUsuarios_' + idUsuario); 
        }
    };
    xhr.send();
}


// *********************************codigo para pacientes*********************************

//modal de registro
function openRegistroPacientesModal() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/paciente/nuevoPaciente.html', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalPacientes'); 
        }
    };
    xhr.send();
}



//modal de detalles
function openDetallesPacientesModal(idPaciente) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/paciente/detallesPaciente.php?idPaciente=' + idPaciente, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalDetallesPacientes_' + idPaciente); // 
        }
    };
    xhr.send();
}


//modal de modificacion
function openModificarPacientesModal(idPaciente) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/paciente/modificarPaciente.php?idPaciente=' + idPaciente, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalModificarPacientes_' + idPaciente); 
        }
    };
    xhr.send();
}


//modal de eliminar
function openEliminarPacientesModal(idPaciente) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/paciente/eliminarPaciente.php?idPaciente=' + idPaciente, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalEliminarPacientes_' + idPaciente); 
        }
    };
    xhr.send();
}


//modal de baja
function openBajaPacientesModal(idPaciente) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/paciente/bajaPaciente.php?idPaciente=' + idPaciente, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalBajaPacientes_' + idPaciente); 
        }
    };
    xhr.send();
}

//modal de alta
function openAltaPacientesModal(idPaciente) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/paciente/altaPaciente.php?idPaciente=' + idPaciente, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalAltaPacientes_' + idPaciente); 
        }
    };
    xhr.send();
}


// *********************************codigo para permisos*********************************

//modal de registro
function openAsignarPermisosModal(idRol) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/permiso/nuevoPermiso.php?idRol=' + idRol, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalAsignarPermisos_' + idRol); 
        }
    };
    xhr.send();
}


//modal de detalles
function openDetallesPermisosModal(idPermiso) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/permiso/detallesPermiso.php?idPermiso=' + idPermiso, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalDetallesPermisos_' + idPermiso); // 
        }
    };
    xhr.send();
}



//modal de eliminar
function openEliminarPermisosModal(idRol) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rol/eliminarPermiso.php?idRol=' + idRol, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalEliminarPermisos_' + idRol); 
        }
    };
    xhr.send();
}


// *********************************codigo para rutinas*********************************

//modal para asignar
function openAsignarRutinasModal(idPaciente) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rutina/nuevoRutina.php?idPaciente=' + idPaciente, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalAsignarRutinas_' + idPaciente); 
        }
    };
    xhr.send();
}


//modal de detalles
function openDetallesRutinasModal(idRutina) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rutina/detallesRutina.php?idRutina=' + idRutina, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalDetallesRutinas_' + idRutina); // 
        }
    };
    xhr.send();
}


//modal de modificacion
function openModificarRutinasModal(idRutina) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rutina/modificarRutina.php?idRutina=' + idRutina, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalModificarRutinas_' + idRutina); 
        }
    };
    xhr.send();
}


//modal de eliminar
function openEliminarRutinasModal(idRutina) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rutina/eliminarRutina.php?idRutina=' + idRutina, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalEliminarRutinas_' + idRutina); 
        }
    };
    xhr.send();
}


// *********************************codigo para ejercicios*********************************

//modal de registro
function openAsignarEjerciciosModal(idRutina) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/ejercicio/nuevoEjercicio.php?idRutina=' + idRutina, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalAsignarEjercicios_' + idRutina); 
        }
    };
    xhr.send();
}


//modal de detalles
function openDetallesEjerciciosModal(idEjercicio) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/ejercicio/detallesEjercicio.php?idEjercicio=' + idEjercicio, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalDetallesEjercicios_' + idEjercicio); // 
        }
    };
    xhr.send();
}



//modal de eliminar
function openEliminarEjerciciosModal(idRutina) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'crud/rutina/eliminarEjercicio.php?idRutina=' + idRutina, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var modalContainer = document.createElement('div');
            modalContainer.innerHTML = xhr.responseText;
            document.body.appendChild(modalContainer);

            openModal('myModalEliminarEjercicios_' + idRutina); 
        }
    };
    xhr.send();
}