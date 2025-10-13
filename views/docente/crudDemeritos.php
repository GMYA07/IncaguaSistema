<?php
require_once 'views/plantillas/header.php';
require_once 'views/plantillas/navbar.php'; ?>

<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-primary to-secondary text-white rounded-lg shadow-lg p-6 mb-6">
        <h1 class="text-3xl font-bold mb-2">
            <i class="fas fa-chalkboard-teacher mr-2"></i>Mi Sección
        </h1>
        <p class="text-sm opacity-90 mb-1">Gestión de Alumnos y Demeritos - Sistema de Méritos y Demeritos MINED</p>
        <small class="text-sm">Sección: <strong id="seccionInfo">1° "A" - Bachillerato General</strong></small>
    </div>

    <!-- Barra de búsqueda -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="relative">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            <input
                    type="text"
                    id="searchInput"
                    placeholder="Buscar alumno por nombre, apellido o NIE..."
                    class="w-full pl-12 pr-4 py-3 border-2 border-gray-300 rounded-lg focus:border-accent focus:outline-none focus:ring-2 focus:ring-accent focus:ring-opacity-50 transition-all"
            >
        </div>
    </div>

    <!-- Botón para añadir alumno -->
    <div class="flex justify-end mb-6">
        <button onclick="openForm()"
                class="flex items-center px-6 py-3 bg-gradient-to-r from-primary to-secondary text-white font-semibold text-sm rounded-lg shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
            <i class="fas fa-user-plus mr-2 text-white"></i>
            Añadir Alumno
        </button>
    </div>


    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <i class="fas fa-users text-4xl text-accent mb-3"></i>
            <h5 class="text-gray-600 font-semibold mb-2">Total Alumnos</h5>
            <h2 class="text-4xl font-bold text-accent" id="totalAlumnos">25</h2>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <i class="fas fa-exclamation-triangle text-4xl text-danger mb-3"></i>
            <h5 class="text-gray-600 font-semibold mb-2">Con Demeritos</h5>
            <h2 class="text-4xl font-bold text-danger" id="alumnosConDemeritos">8</h2>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <i class="fas fa-check-circle text-4xl text-success mb-3"></i>
            <h5 class="text-gray-600 font-semibold mb-2">Sin Demeritos</h5>
            <h2 class="text-4xl font-bold text-success" id="alumnosSinDemeritos">17</h2>
        </div>
    </div>

    <!-- Listado de alumnos -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-gradient-to-r from-primary to-secondary text-white p-4">
            <h5 class="text-xl font-semibold"><i class="fas fa-users mr-2"></i>Listado de Alumnos</h5>
        </div>
        <div class="p-6">
            <div id="studentsList"></div>
            <div id="noResults" class="hidden text-center py-12 text-gray-500">
                <i class="fas fa-search text-6xl mb-4"></i>
                <p class="text-lg">No se encontraron alumnos que coincidan con la búsqueda</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-opacity-70 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div id="formContainer"
         class="bg-white rounded-2xl shadow-2xl w-11/12 max-w-4xl max-h-[90vh] overflow-hidden relative">
        <!-- Drag Handle -->
        <div id="dragHandle"
             class="bg-gradient-to-r from-primary to-secondary text-white p-6 cursor-move select-none flex justify-between items-center rounded-t-2xl">
            <h5 class="text-xl font-semibold">
                <i class="fas fa-exclamation-triangle mr-2"></i>Demeritos del Alumno
            </h5>
            <button onclick="closeModal()"
                    class="bg-white bg-opacity-20 hover:bg-opacity-30 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:rotate-90">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-8 max-h-[calc(90vh-180px)] overflow-y-auto custom-scrollbar">
            <!-- Información del alumno -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-200 rounded-lg p-6 mb-6 border-l-4 border-accent">
                <h6 class="text-gray-800 font-semibold mb-2">
                    <i class="fas fa-user mr-2"></i><strong>Alumno:</strong>
                    <span id="modalAlumnoNombre"></span>
                </h6>
                <p class="text-gray-700 mb-2">
                    <i class="fas fa-id-card mr-2"></i><strong>NIE:</strong>
                    <span id="modalAlumnoNIE"></span>
                </p>
                <p class="text-gray-700 mb-0">
                    <i class="fas fa-exclamation-circle mr-2"></i><strong>Total Demeritos:</strong>
                    <span id="modalTotalDemeritos"
                          class="inline-block ml-2 px-4 py-1 bg-danger text-white rounded-full font-semibold">0</span>
                </p>
            </div>

            <h6 class="text-gray-800 font-semibold mb-4 text-lg">
                <i class="fas fa-list mr-2"></i>Demeritos Registrados:
            </h6>
            <div id="demeritsListContainer"></div>
        </div>

        <!-- Modal Footer -->
        <div class="bg-gray-50 p-6 rounded-b-2xl text-right">
            <button onclick="closeModal()"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                <i class="fas fa-times mr-2"></i>Cerrar
            </button>
        </div>
    </div>
</div>

<div id="formModal" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 p-4">
    <div id="formContainer"
         class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative overflow-hidden animate-fadeIn">
        <!-- Header con decoración -->
        <div id="dragHandle"
             class="draggable bg-gradient-to-br from-[#8B2F2F] to-[#6B1F1F] p-8 text-center relative overflow-hidden">
            <!-- Decoración de fondo -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -ml-12 -mb-12"></div>
            <button onclick="closeForm()"
                    class="absolute top-4 right-4 text-white hover:text-gray-200 text-2xl font-bold transition transform hover:rotate-90 duration-300 z-10">
                &times;
            </button> <!-- Imagen de perfil circular -->
            <div class="relative inline-block mb-4">
                <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-lg ring-4 ring-white/30">
                    <svg class="w-12 h-12 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div> <!-- Badge decorativo -->
                <div class="absolute -bottom-1 -right-1 bg-green-500 w-6 h-6 rounded-full border-4 border-white"></div>
            </div>
            <h2 id="formTitle" class="text-white text-2xl font-bold tracking-wide">Añadir Alumno</h2>
        <div class="bg-white rounded-lg shadow-md p-8">
            <!-- Barra de acciones -->
            <div class="flex justify-between items-center mb-6">
                <h5 class="text-2xl font-semibold text-gray-700">
                    <i class="fas fa-users mr-2 text-accent"></i>Gestión de Alumnos
                </h5>

                <!-- Botón estilo select group -->
                <div class="relative inline-block text-left">
                    <button id="actionsButton"
                            class="inline-flex justify-center items-center px-5 py-3 bg-gradient-to-r from-primary to-secondary text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                        <i class="fas fa-user-cog mr-2"></i>
                        Acciones
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>

                    <!-- Dropdown -->
                    <div id="actionsMenu"
                         class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 z-10">

                        <!-- Seleccionar alumno -->
                        <div class="px-4 py-3 border-b border-gray-100">
                            <label for="selectAlumno" class="block text-sm font-medium text-gray-700 mb-1">
                                Seleccionar alumno
                            </label>
                            <select id="selectAlumno"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary text-sm">
                                <option value="">-- Elegir alumno --</option>
                                <option value="1">Juan Pérez</option>
                                <option value="2">María López</option>
                                <option value="3">Carlos Rivera</option>
                            </select>
                        </div>

                        <!-- Otras acciones -->
                        <button onclick="openForm()"
                                class="w-full flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-plus-circle mr-2 text-accent"></i> Añadir Alumno
                        </button>
                        <button onclick="alert('Función próximamente disponible')"
                                class="w-full flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-b-lg transition">
                            <i class="fas fa-upload mr-2 text-accent"></i> Importar CSV
                        </button>
                    </div>
                </div>
            </div>

            <!-- Botones -->
                <div class="flex gap-4 pt-4">
                    <button type="button" onclick="closeForm()"
                            class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 border-2 border-gray-200 hover:border-gray-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Cancelar
                    </button>
                    <button type="submit"
                            class="flex-1 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F] text-white py-3 rounded-xl font-semibold hover:from-[#6B1F1F] hover:to-[#5B0F0F] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Guardar
                    </button>
                </div>
            </form>
        </div> <!-- Barra decorativa inferior -->
        <div class="h-2 bg-gradient-to-r from-[#8B2F2F] via-[#A63F3F] to-[#8B2F2F]"></div>
    </div>
</div>

<script>

        const actionsButton = document.getElementById('actionsButton');
        const actionsMenu = document.getElementById('actionsMenu');

        // Mostrar / ocultar menú de acciones
        actionsButton.addEventListener('click', () => {
        actionsMenu.classList.toggle('hidden');
    });

        // Cerrar menú si se hace clic fuera
        document.addEventListener('click', (e) => {
        if (!actionsButton.contains(e.target) && !actionsMenu.contains(e.target)) {
        actionsMenu.classList.add('hidden');
    }
    });

        // Función para abrir el formulario de agregar alumno
        function openForm() {
        document.getElementById('formModal').classList.remove('hidden');
        document.getElementById('actionsMenu').classList.add('hidden');
    }

        function closeForm() {
        document.getElementById('formModal').classList.add('hidden');
    }

    // Datos de ejemplo
    const alumnos = [
        {
            id: 1,
            nie: "1234567-8",
            nombres: "María José",
            apellidos: "Hernández López",
            demeritos: [
                {
                    id: 1,
                    tipo: "Incumplimiento de uniforme",
                    descripcion: "No portaba el uniforme completo",
                    fecha: "2025-10-05",
                    aplicadoPor: "Prof. García"
                },
                {
                    id: 2,
                    tipo: "Llegada tardía reiterada",
                    descripcion: "Tercera vez en la semana",
                    fecha: "2025-10-08",
                    aplicadoPor: "Prof. Martínez"
                }
            ]
        },
        {
            id: 2,
            nie: "2345678-9",
            nombres: "Carlos Alberto",
            apellidos: "Rodríguez Pérez",
            demeritos: [
                {
                    id: 3,
                    tipo: "Falta de respeto",
                    descripcion: "Conducta inapropiada en clase",
                    fecha: "2025-10-07",
                    aplicadoPor: "Prof. López"
                }
            ]
        },
        {
            id: 3,
            nie: "3456789-0",
            nombres: "Ana Gabriela",
            apellidos: "Martínez Cruz",
            demeritos: []
        },
        {
            id: 4,
            nie: "4567890-1",
            nombres: "José Manuel",
            apellidos: "García Flores",
            demeritos: [
                {
                    id: 4,
                    tipo: "No presentar tareas",
                    descripcion: "Tres tareas sin entregar",
                    fecha: "2025-10-09",
                    aplicadoPor: "Prof. Ramírez"
                },
                {
                    id: 5,
                    tipo: "Uso de celular en clase",
                    descripcion: "Utilizando redes sociales durante la clase",
                    fecha: "2025-10-10",
                    aplicadoPor: "Prof. García"
                }
            ]
        },
        {
            id: 5,
            nie: "5678901-2",
            nombres: "Sandra Patricia",
            apellidos: "López Morales",
            demeritos: []
        },
        {
            id: 6,
            nie: "6789012-3",
            nombres: "Roberto Carlos",
            apellidos: "Ramírez Santos",
            demeritos: [
                {
                    id: 6,
                    tipo: "Agresión verbal",
                    descripcion: "Discusión con compañero",
                    fecha: "2025-10-06",
                    aplicadoPor: "Prof. Hernández"
                }
            ]
        }
    ];

    let alumnoSeleccionado = null;
    let alumnosFiltrados = [...alumnos];

    // Variables para el arrastre
    let isDragging = false;
    let currentX;
    let currentY;
    let initialX;
    let initialY;
    let xOffset = 0;
    let yOffset = 0;

    const dragHandle = document.getElementById('dragHandle');
    const formContainer = document.getElementById('formContainer');

    // Eventos del ratón
    dragHandle.addEventListener('mousedown', dragStart);
    document.addEventListener('mousemove', drag);
    document.addEventListener('mouseup', dragEnd);

    // Eventos táctiles
    dragHandle.addEventListener('touchstart', dragStart);
    document.addEventListener('touchmove', drag);
    document.addEventListener('touchend', dragEnd);

    function dragStart(e) {
        if (e.type === 'touchstart') {
            initialX = e.touches[0].clientX - xOffset;
            initialY = e.touches[0].clientY - yOffset;
        } else {
            initialX = e.clientX - xOffset;
            initialY = e.clientY - yOffset;
        }

        if (e.target === dragHandle || dragHandle.contains(e.target)) {
            isDragging = true;
            dragHandle.classList.add('dragging');
        }
    }

    function drag(e) {
        if (isDragging) {
            e.preventDefault();

            if (e.type === 'touchmove') {
                currentX = e.touches[0].clientX - initialX;
                currentY = e.touches[0].clientY - initialY;
            } else {
                currentX = e.clientX - initialX;
                currentY = e.clientY - initialY;
            }

            xOffset = currentX;
            yOffset = currentY;

            setTranslate(currentX, currentY, formContainer);
        }
    }

    function dragEnd(e) {
        initialX = currentX;
        initialY = currentY;
        isDragging = false;
        dragHandle.classList.remove('dragging');
    }

    function setTranslate(xPos, yPos, el) {
        el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0)`;
    }

    // Cerrar con ESC
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    function getDemeritClass(count) {
        if (count === 0) return 'bg-success';
        if (count <= 2) return 'bg-warning';
        return 'bg-danger';
    }

    function getUltimaFechaDemerito(demeritos) {
        if (demeritos.length === 0) return 'Sin demeritos';
        const fechas = demeritos.map(d => new Date(d.fecha));
        const ultima = new Date(Math.max(...fechas));
        return ultima.toLocaleDateString('es-SV');
    }

    function renderStudents() {
        const container = document.getElementById('studentsList');
        const noResults = document.getElementById('noResults');
        container.innerHTML = '';

        if (alumnosFiltrados.length === 0) {
            container.classList.add('hidden');
            noResults.classList.remove('hidden');
            return;
        }

        container.classList.remove('hidden');
        noResults.classList.add('hidden');

        alumnosFiltrados.forEach(alumno => {
            const totalDemeritos = alumno.demeritos.length;
            const ultimaFecha = getUltimaFechaDemerito(alumno.demeritos);
            const badgeClass = getDemeritClass(totalDemeritos);

            const card = document.createElement('div');
            card.className = 'bg-white rounded-lg p-6 mb-4 shadow-md hover:shadow-xl transition-all duration-300 hover:translate-x-2 border-l-4 border-accent';
            card.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                        <div class="md:col-span-4">
                            <h6 class="font-bold text-gray-800 mb-1">${alumno.nombres} ${alumno.apellidos}</h6>
                            <small class="text-gray-500"><i class="fas fa-id-card mr-1"></i>NIE: ${alumno.nie}</small>
                        </div>
                        <div class="md:col-span-3 text-center">
                            <span class="inline-block px-4 py-2 ${badgeClass} text-white rounded-full font-semibold text-sm">
                                <i class="fas fa-exclamation-circle mr-1"></i>${totalDemeritos} Demeritos
                            </span>
                        </div>
                        <div class="md:col-span-3 text-center">
                            <small class="text-gray-500 block mb-1">Última aplicación:</small>
                            <strong class="text-gray-800">${ultimaFecha}</strong>
                        </div>
                        <div class="md:col-span-2 text-center md:text-right">
                            <button
                                onclick="verDemeritos(${alumno.id})"
                                ${totalDemeritos === 0 ? 'disabled' : ''}
                                class="bg-primary hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold transition-all duration-300 disabled:bg-gray-400 disabled:cursor-not-allowed hover:scale-105"
                            >
                                <i class="fas fa-eye mr-1"></i>Ver
                            </button>
                        </div>
                    </div>
                `;
            container.appendChild(card);
        });
    }

    function verDemeritos(alumnoId) {
        alumnoSeleccionado = alumnos.find(a => a.id === alumnoId);

        document.getElementById('modalAlumnoNombre').textContent =
            `${alumnoSeleccionado.nombres} ${alumnoSeleccionado.apellidos}`;
        document.getElementById('modalAlumnoNIE').textContent = alumnoSeleccionado.nie;
        document.getElementById('modalTotalDemeritos').textContent = alumnoSeleccionado.demeritos.length;

        renderDemerits();

        document.getElementById('modalOverlay').classList.remove('hidden');
        document.getElementById('modalOverlay').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('modalOverlay').classList.add('hidden');
        document.getElementById('modalOverlay').classList.remove('flex');
        xOffset = 0;
        yOffset = 0;
        formContainer.style.transform = 'translate3d(0px, 0px, 0)';
    }

    function renderDemerits() {
        const container = document.getElementById('demeritsListContainer');

        if (alumnoSeleccionado.demeritos.length === 0) {
            container.innerHTML = `
                    <div class="text-center py-12 text-gray-500">
                        <i class="fas fa-check-circle text-6xl text-success mb-4"></i>
                        <p class="text-lg">Este alumno no tiene demeritos registrados</p>
                    </div>
                `;
            return;
        }

        container.innerHTML = '';
        alumnoSeleccionado.demeritos.forEach(demerito => {
            const item = document.createElement('div');
            item.className = 'bg-gray-50 rounded-lg p-5 mb-4 border-l-4 border-danger hover:bg-gray-100 transition-all duration-200 hover:translate-x-2';
            item.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                        <div class="md:col-span-8">
                            <h6 class="font-bold text-gray-800 mb-2">
                                <i class="fas fa-exclamation-triangle text-danger mr-2"></i>${demerito.tipo}
                            </h6>
                            <p class="text-gray-600 mb-2">${demerito.descripcion}</p>
                            <small class="text-gray-500">
                                <i class="fas fa-calendar mr-1"></i>${new Date(demerito.fecha).toLocaleDateString('es-SV')} |
                                <i class="fas fa-user ml-2 mr-1"></i>${demerito.aplicadoPor}
                            </small>
                        </div>
                        <div class="md:col-span-4 text-center md:text-right">
                            <button
                                onclick="quitarDemerito(${demerito.id})"
                                class="bg-danger hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold transition-all duration-300 hover:scale-105"
                            >
                                <i class="fas fa-trash-alt mr-1"></i>Quitar
                            </button>
                        </div>
                    </div>
                `;
            container.appendChild(item);
        });
    }

    function quitarDemerito(demeritoId) {
        if (!confirm('¿Está seguro que desea eliminar este demerito?')) {
            return;
        }

        const index = alumnoSeleccionado.demeritos.findIndex(d => d.id === demeritoId);
        if (index !== -1) {
            alumnoSeleccionado.demeritos.splice(index, 1);

            renderDemerits();
            renderStudents();
            updateStats();
            document.getElementById('modalTotalDemeritos').textContent = alumnoSeleccionado.demeritos.length;

            if (alumnoSeleccionado.demeritos.length === 0) {
                setTimeout(() => {
                    closeModal();
                }, 1000);
            }

            alert('Demerito eliminado correctamente');
        }
    }

    // Búsqueda
    document.getElementById('searchInput').addEventListener('input', function (e) {
        const searchTerm = e.target.value.toLowerCase().trim();

        if (searchTerm === '') {
            alumnosFiltrados = [...alumnos];
        } else {
            alumnosFiltrados = alumnos.filter(alumno => {
                const nombreCompleto = `${alumno.nombres} ${alumno.apellidos}`.toLowerCase();
                const nie = alumno.nie.toLowerCase();
                return nombreCompleto.includes(searchTerm) || nie.includes(searchTerm);
            });
        }

        renderStudents();
    });

    function updateStats() {
        const total = alumnos.length;
        const conDemeritos = alumnos.filter(a => a.demeritos.length > 0).length;
        const sinDemeritos = total - conDemeritos;

        document.getElementById('totalAlumnos').textContent = total;
        document.getElementById('alumnosConDemeritos').textContent = conDemeritos;
        document.getElementById('alumnosSinDemeritos').textContent = sinDemeritos;
    }

    // Inicializar
    renderStudents();
    updateStats();
</script>

<?php require_once 'views/plantillas/footer.php'; ?>