<?php
require_once 'views/plantillas/header.php';
require_once 'views/plantillas/navbar.php'; ?>

<section class="p-15">
    <!-- Buscador -->
    <div class="flex mb-4 gap-2">
        <input type="text" placeholder="🔍 Buscar docente"
            class="flex-1 p-3 rounded-full border border-gray-400 shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" />
        <button class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition cursor-pointer">Buscar</button>
    </div>

    <!-- Sección de tabla -->
    <section class="container mx-auto">

        <!-- Tabla para pantallas grandes -->
        <div class="lg:block hidden overflow-auto shadow-lg rounded-lg h-[550px]" style="background-color: aliceblue;">
            <table class="w-full border-collapse rounded-lg table-fixed">
                <thead class="sticky top-0 bg-[#D9D9D9]">
                    <tr class="bg-[#D9D9D9]">
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/4">Nombre</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">NIE</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">Materia</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">Usuario</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">Estado</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="bg-white even:bg-gray-100">
                        <td class="px-6 py-4 border-b border-gray-300">Carlos Pérez</td>
                        <td class="px-6 py-4 border-b border-gray-300">D001</td>
                        <td class="px-6 py-4 border-b border-gray-300">Matemáticas</td>
                        <td class="px-6 py-4 border-b border-gray-300">c.perez</td>
                        <td class="px-6 py-4 border-b border-gray-300">Activo</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            <div class="flex gap-2">
                                <button onclick="openForm('editar', {id:1, nombre:'Carlos Pérez', docenteId:'D001', materia:'Matemáticas', usuario:'c.perez', estado:'Activo'})"
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition cursor-pointer">Editar</button>
                                <button onclick="openForm('eliminar', {id:1, nombre:'Carlos Pérez'})"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition cursor-pointer">Eliminar</button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white even:bg-gray-100">
                        <td class="px-6 py-4 border-b border-gray-300">Lucía Gómez</td>
                        <td class="px-6 py-4 border-b border-gray-300">D002</td>
                        <td class="px-6 py-4 border-b border-gray-300">Ciencias</td>
                        <td class="px-6 py-4 border-b border-gray-300">l.gomez</td>
                        <td class="px-6 py-4 border-b border-gray-300">Activo</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            <div class="flex gap-2">
                                <button onclick="openForm('editar', {id:2, nombre:'Lucía Gómez', docenteId:'D002', materia:'Ciencias', usuario:'l.gomez', estado:'Activo'})"
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition cursor-pointer">Editar</button>
                                <button onclick="openForm('eliminar', {id:2, nombre:'Lucía Gómez'})"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition cursor-pointer">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Vista móvil - Acordeón -->
        <div class="block lg:hidden space-y-3 overflow-auto h-[550px]">

            <!-- Card ejemplo -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition"
                    onclick="toggleAccordion('accordion1')">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg">Carlos Pérez</h3>
                        <p class="text-sm text-gray-600">ID: D001 - Materia: Matemáticas</p>
                        <span class="inline-block mt-1 px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Activo</span>
                    </div>
                    <svg id="icon1" class="w-6 h-6 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div id="accordion1" class="hidden border-t border-gray-200">
                    <div class="p-4 bg-gray-50">
                        <div class="space-y-2 text-sm">
                            <p><span class="font-semibold">Usuario:</span> c.perez</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button onclick="openForm('editar', {id:1, nombre:'Carlos Pérez', docenteId:'D001', materia:'Matemáticas', usuario:'c.perez', estado:'Activo'})"
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm cursor-pointer">Editar</button>
                            <button onclick="openForm('eliminar', {id:1, nombre:'Carlos Pérez'})"
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm cursor-pointer">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-4 flex justify-end space-x-4">
            <button onclick="openForm('añadir')"
                class="px-4 py-2 text-white rounded hover:bg-[#6B1F1F] transition cursor-pointer" style="background-color: #8B2F2F;">
                Añadir docente
            </button>
            <button class="px-4 py-2 text-white rounded hover:bg-[#2a2690] transition cursor-pointer" style="background-color: #322FAC;">
                Generar reporte
            </button>
        </div>

    </section>

    <form id="formModal" class="hidden fixed inset-0 bg-opacity-60 flex items-center justify-center z-50 p-4">
        <div id="formContainer" class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative overflow-hidden animate-fadeIn">

            <!-- Header con decoración -->
            <div id="dragHandle" class="draggable bg-gradient-to-br from-[#8B2F2F] to-[#6B1F1F] p-8 text-center relative overflow-hidden">
                <!-- Decoración de fondo -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -mr-16 -mt-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -ml-12 -mb-12"></div>

                <button onclick="closeForm()"
                    class="absolute top-4 right-4 text-white hover:text-gray-200 text-2xl font-bold transition cursor-pointer transform hover:rotate-90 duration-300 z-10">
                    &times;
                </button>

                <!-- Imagen de perfil circular -->
                <div class="relative inline-block mb-4">
                    <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-lg ring-4 ring-white/30">
                        <svg class="w-12 h-12 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <!-- Badge decorativo -->
                    <div class="absolute -bottom-1 -right-1 bg-green-500 w-6 h-6 rounded-full border-4 border-white"></div>
                </div>

                <h2 id="formTitle" class="text-white text-2xl font-bold tracking-wide">Añadir Docente</h2>
                <p class="text-white/80 text-sm mt-1">Complete la información del estudiante</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-8">
                <!-- Formulario -->
                <form id="alumnoForm" method="POST" action="controllers/alumnosController.php" class="space-y-8">
                    <input type="hidden" name="id_alumno" id="id_alumno">
                    <input type="hidden" name="accion" id="accion" value="añadir">

                    <!-- Nombre -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-semibold text-sm">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                                </svg>
                                Nombre completo
                            </span>
                        </label>
                        <div class="relative">
                            <input type="text" name="nombre" id="nombre" required placeholder="Ingrese el nombre"
                                class="w-full px-4 py-3 pl-10 bg-gray-50 border-2 border-gray-200 
                    rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 
                        0zM12 14a7 7 0 00-7 7h14a7 7 0 
                        00-7-7z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Año académico -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-semibold text-sm">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 
                            0-1.99.9-1.99 2L3 19c0 1.1.89 2 
                            2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 
                            16H5V8h14v11z" />
                                </svg>
                                Año académico
                            </span>
                        </label>
                        <div class="relative">
                            <input type="number" name="anio" id="anio" required placeholder="2025"
                                class="w-full px-4 py-3 pl-10 bg-gray-50 border-2 border-gray-200 
                    rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 
                        0 002-2V7a2 2 0 00-2-2H5a2 2 0 
                        00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Sección y Especialidad -->
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-semibold text-sm">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
                                    </svg>
                                    Sección
                                </span>
                            </label>
                            <input type="text" name="seccion" id="seccion" required placeholder="A, B, C..."
                                class="w-full px-4 py-3 text-center bg-gray-50 border-2 border-gray-200 
                    rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200 font-semibold">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-gray-700 font-semibold text-sm">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 
                                3zm6.82 6L12 12.72 5.18 9 12 5.28 
                                18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 
                                15l5-2.73v3.72z" />
                                    </svg>
                                    Especialidad
                                </span>
                            </label>
                            <input type="text" name="especialidad" id="especialidad" required placeholder="Matemáticas..."
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl 
                    focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-semibold text-sm">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 
                            12s4.48 10 10 10 10-4.48 10-10S17.52 
                            2 12 2zm-2 15l-5-5 
                            1.41-1.41L10 14.17l7.59-7.59L19 
                            8l-9 9z" />
                                </svg>
                                Estado del Docente
                            </span>
                        </label>
                        <div class="relative">
                            <select name="estado" id="estado" required
                                class="w-full px-4 py-3 pl-10 bg-gradient-to-r from-gray-50 to-gray-100 border-2 
                    border-gray-200 rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none appearance-none cursor-pointer font-medium transition-all duration-200">
                                <option value="Activo">✓ Activo</option>
                                <option value="Inactivo">✗ Inactivo</option>
                            </select>
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5 pointer-events-none" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 
                        11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <svg class="w-5 h-5 text-[#8B2F2F] absolute right-3 top-3.5 pointer-events-none" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-4 pt-4">
                        <button type="button" onclick="closeForm()"
                            class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 
                transition-all duration-200 border-2 border-gray-200 hover:border-gray-300 flex items-center 
                justify-center gap-2 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancelar
                        </button>

                        <button type="submit"
                            class="flex-1 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F] text-white py-3 rounded-xl 
                font-semibold hover:from-[#6B1F1F] hover:to-[#5B0F0F] transition-all duration-200 
                shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>


            <!-- Barra decorativa inferior -->
            <div class="h-2 bg-gradient-to-r from-[#8B2F2F] via-[#A63F3F] to-[#8B2F2F]"></div>
        </div>
    </form>

    <script>
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
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeForm();
            }
        });
    </script>

    <script>
        // Función para abrir el modal (modo añadir o editar)
        function openForm(modo, data = null) {
            document.getElementById('formModal').classList.remove('hidden');
            document.getElementById('accion').value = modo;
            document.getElementById('formTitle').textContent = modo === 'editar' ? 'Editar Docente' : 'Añadir Docente';

            // Si es editar, llenamos los campos
            if (modo === 'editar' && data) {
                document.getElementById('id_alumno').value = data.id;
                document.getElementById('nombre').value = data.nombre;
                document.getElementById('anio').value = data.anio;
                document.getElementById('seccion').value = data.seccion;
                document.getElementById('especialidad').value = data.especialidad;
                document.getElementById('estado').value = data.estado;
            } else {
                // Limpiamos los campos
                document.getElementById('alumnoForm').reset();
                document.getElementById('id_alumno').value = '';
            }
        }

        // Cierra el modal
        function closeForm() {
            document.getElementById('formModal').classList.add('hidden');
        }
    </script>
</section>


<?php require_once 'views/plantillas/footer.php'; ?>