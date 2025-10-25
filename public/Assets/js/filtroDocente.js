function filtrarDocentes(filtro) {
            const docentes = document.querySelectorAll('.docente-item');
            const noResults = document.getElementById('noResults');
            let visibleCount = 0; //cuantos son visibles

            docentes.forEach(docente => {
                const estado = docente.getAttribute('data-estado');
                let mostrar = false;

                if (filtro === 'todos') {
                    mostrar = true;
                } else if (filtro === 'activos' && estado === 'activo') {
                    mostrar = true;
                } else if (filtro === 'inactivos' && estado === 'inactivo') {
                    mostrar = true;
                }

                if (mostrar) {
                    docente.classList.remove('hidden');
                    visibleCount++;
                } else {
                    docente.classList.add('hidden');
                }
            });

            // Mostrar mensaje si no hay resultados
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
}