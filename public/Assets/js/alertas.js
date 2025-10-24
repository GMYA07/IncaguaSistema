const AlertHelper = {
    docente: {
        success: {
            icon: 'success',
            title: '¡Éxito!',
            text: 'Docente agregado correctamente'
        },
        error: {
            icon: 'error',
            title: 'Error',
            text: 'No se pudo agregar el docente'
        }
    },
    
    show: function(type, action) {
        Swal.fire(this[type][action]);
    }
};