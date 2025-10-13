<?php
require_once 'views/plantillas/header.php';
require_once 'views/plantillas/navbar.php'; ?>

<section class="p-15">
    <!-- Buscador -->
    <div class="flex mb-4 gap-2">
        <input type="text" placeholder="🔍 Buscar alumno"
            class="flex-1 p-3 rounded-full border border-gray-400 shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" />
        <button class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Buscar</button>
    </div>

    <!-- Sección de tabla -->
    <section class="container mx-auto">

        <!-- Tabla para pantallas grandes -->
        <div class="lg:block hidden overflow-auto shadow-lg rounded-lg h-[550px]" style="background-color: aliceblue;">
            <table class="w-full border-collapse rounded-lg table-fixed">
                <thead class="sticky top-0 bg-[#D9D9D9]">
                    <tr class="bg-[#D9D9D9]">
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">Alumno</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/12">Año</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">Sección</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">Especialidad</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/6">Estado</th>
                        <th class="px-6 py-3 border-b border-gray-400 text-left w-1/4">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="bg-white even:bg-gray-100">
                        <td class="px-6 py-4 border-b border-gray-300">Jose Matias</td>
                        <td class="px-6 py-4 border-b border-gray-300">2025</td>
                        <td class="px-6 py-4 border-b border-gray-300">A</td>
                        <td class="px-6 py-4 border-b border-gray-300">Matemáticas</td>
                        <td class="px-6 py-4 border-b border-gray-300">Activo</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            <div class="flex gap-2">
                                <button onclick="openEditForm(1)"
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Editar</button>
                                <button onclick="openDeleteModal(1)"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Eliminar</button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white even:bg-gray-100">
                        <td class="px-6 py-4 border-b border-gray-300">Maria Lopez</td>
                        <td class="px-6 py-4 border-b border-gray-300">2025</td>
                        <td class="px-6 py-4 border-b border-gray-300">B</td>
                        <td class="px-6 py-4 border-b border-gray-300">Ciencias</td>
                        <td class="px-6 py-4 border-b border-gray-300">Activo</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            <div class="flex gap-2">
                                <button onclick="openEditForm(2)"
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Editar</button>
                                <button onclick="openDeleteModal(2)"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Eliminar</button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white even:bg-gray-100">
                        <td class="px-6 py-4 border-b border-gray-300">Karla</td>
                        <td class="px-6 py-4 border-b border-gray-300">2024</td>
                        <td class="px-6 py-4 border-b border-gray-300">C</td>
                        <td class="px-6 py-4 border-b border-gray-300">Historia</td>
                        <td class="px-6 py-4 border-b border-gray-300">Inactivo</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            <div class="flex gap-2">
                                <button onclick="openEditForm(3)"
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Editar</button>
                                <button onclick="openDeleteModal(3)"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Eliminar</button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white even:bg-gray-100">
                        <td class="px-6 py-4 border-b border-gray-300">Brian</td>
                        <td class="px-6 py-4 border-b border-gray-300">2023</td>
                        <td class="px-6 py-4 border-b border-gray-300">A</td>
                        <td class="px-6 py-4 border-b border-gray-300">Lengua</td>
                        <td class="px-6 py-4 border-b border-gray-300">Activo</td>
                        <td class="px-6 py-4 border-b border-gray-300">
                            <div class="flex gap-2">
                                <button onclick="openEditForm(4)"
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Editar</button>
                                <button onclick="openDeleteModal(4)"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Vista móvil - Acordeón (solo pantallas pequeñas) -->
        <div class="block lg:hidden space-y-3 overflow-auto h-[550px]">

            <!-- Card 1 - Jose Matias -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition"
                    onclick="toggleAccordion('accordion1')">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg">Jose Matias</h3>
                        <p class="text-sm text-gray-600">2025 - Sección A</p>
                        <span class="inline-block mt-1 px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Activo</span>
                    </div>
                    <svg id="icon1" class="w-6 h-6 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div id="accordion1" class="hidden border-t border-gray-200">
                    <div class="p-4 bg-gray-50">
                        <div class="space-y-2 text-sm">
                            <p><span class="font-semibold">Especialidad:</span> Matemáticas</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button onclick="openEditForm(1)"
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm">Editar</button>
                            <button onclick="openDeleteModal(1)"
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Maria Lopez -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition"
                    onclick="toggleAccordion('accordion2')">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg">Maria Lopez</h3>
                        <p class="text-sm text-gray-600">2025 - Sección B</p>
                        <span class="inline-block mt-1 px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Activo</span>
                    </div>
                    <svg id="icon2" class="w-6 h-6 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div id="accordion2" class="hidden border-t border-gray-200">
                    <div class="p-4 bg-gray-50">
                        <div class="space-y-2 text-sm">
                            <p><span class="font-semibold">Especialidad:</span> Ciencias</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button onclick="openEditForm(2)"
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm">Editar</button>
                            <button onclick="openDeleteModal(2)"
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Karla -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition"
                    onclick="toggleAccordion('accordion3')">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg">Karla</h3>
                        <p class="text-sm text-gray-600">2024 - Sección C</p>
                        <span class="inline-block mt-1 px-2 py-1 text-xs bg-red-100 text-red-700 rounded">Inactivo</span>
                    </div>
                    <svg id="icon3" class="w-6 h-6 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div id="accordion3" class="hidden border-t border-gray-200">
                    <div class="p-4 bg-gray-50">
                        <div class="space-y-2 text-sm">
                            <p><span class="font-semibold">Especialidad:</span> Historia</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button onclick="openEditForm(3)"
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm">Editar</button>
                            <button onclick="openDeleteModal(3)"
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 - Brian -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition"
                    onclick="toggleAccordion('accordion4')">
                    <div class="flex-1">
                        <h3 class="font-semibold text-lg">Brian</h3>
                        <p class="text-sm text-gray-600">2023 - Sección A</p>
                        <span class="inline-block mt-1 px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Activo</span>
                    </div>
                    <svg id="icon4" class="w-6 h-6 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div id="accordion4" class="hidden border-t border-gray-200">
                    <div class="p-4 bg-gray-50">
                        <div class="space-y-2 text-sm">
                            <p><span class="font-semibold">Especialidad:</span> Lengua</p>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <button onclick="openEditForm(4)"
                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm">Editar</button>
                            <button onclick="openDeleteModal(4)"
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-4 flex justify-end space-x-4">
            <button onclick="openAddForm()"
                class="px-4 py-2 text-white rounded hover:bg-[#6B1F1F] transition" style="background-color: #8B1A1A;">
                Añadir alumno
            </button>
            <button class="px-4 py-2 text-white rounded hover:bg-[#2a2690] transition" style="background-color: #322FAC;">
                Generar reporte
            </button>
        </div>

    </section>

    <!-- MODAL DE FORMULARIO -->
    <div id="formModal" class="hidden fixed inset-0 bg-opacity-60 flex items-center justify-center z-50 p-4 p-8 h-max-[550px] ">
        <div id="formContainer" class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative overflow-hidden animate-fadeIn">

            <!-- Header con decoración -->
            <div id="dragHandle" class="draggable bg-gradient-to-br from-[#8B2F2F] to-[#6B1F1F] p-8 text-center relative overflow-hidden cursor-move">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -mr-16 -mt-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -ml-12 -mb-12"></div>

                <button onclick="closeForm()"
                    class="absolute top-4 right-4 text-white hover:text-gray-200 text-2xl font-bold transition transform hover:rotate-90 duration-300 z-10">
                    &times;
                </button>

                <div class="relative inline-block mb-4">
                    <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-lg ring-4 ring-white/30">
                        <svg class="w-12 h-12 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <div class="absolute -bottom-1 -right-1 bg-green-500 w-6 h-6 rounded-full border-4 border-white"></div>
                </div>

                <h2 id="formTitle" class="text-white text-2xl font-bold tracking-wide">Añadir Alumno</h2>
                <p class="text-white/80 text-sm mt-1">Complete la información del estudiante</p>
            </div>

            <div class="bg-white rounded-lg shadow-md">
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
                                class="w-full px-4 py-3 pl-10 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Año académico -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-semibold text-sm">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11z" />
                                </svg>
                                Año académico
                            </span>
                        </label>
                        <div class="relative">
                            <input type="number" name="anio" id="anio" required placeholder="2025"
                                class="w-full px-4 py-3 pl-10 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
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
                                class="w-full px-4 py-3 text-center bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200 font-semibold">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-gray-700 font-semibold text-sm">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z" />
                                    </svg>
                                    Especialidad
                                </span>
                            </label>
                            <input type="text" name="especialidad" id="especialidad" required placeholder="Matemáticas..."
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-semibold text-sm">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                </svg>
                                Estado del alumno
                            </span>
                        </label>
                        <div class="relative">
                            <select name="estado" id="estado" required
                                class="w-full px-4 py-3 pl-10 bg-gradient-to-r from-gray-50 to-gray-100 border-2 border-gray-200 rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none appearance-none cursor-pointer font-medium transition-all duration-200">
                                <option value="Activo">✓ Activo</option>
                                <option value="Inactivo">✗ Inactivo</option>
                            </select>
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <svg class="w-5 h-5 text-[#8B2F2F] absolute right-3 top-3.5 pointer-events-none" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 10l5 5 5-5z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-4 pt-4">
                        <button type="button" onclick="closeForm()"
                            class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 border-2 border-gray-200 hover:border-gray-300 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancelar
                        </button>

                        <button type="submit"
                            class="flex-1 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F] text-white py-3 rounded-xl font-semibold hover:from-[#6B1F1F] hover:to-[#5B0F0F] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>

            <div class="h-2 bg-gradient-to-r from-[#8B2F2F] via-[#A63F3F] to-[#8B2F2F]"></div>
        </div>
    </div>

    <!-- MODAL DE ELIMINACIÓN -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-opacity-60 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative overflow-hidden animate-fadeIn">

            <div class="flex items-center gap-3 px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F]">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white/20">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-white">Eliminar alumno</h2>
            </div>

            <div class="p-6 text-center space-y-4">
                <p class="text-gray-700 text-sm">
                    ¿Estás seguro de que deseas eliminar este alumno?
                </p>
                <p class="text-gray-500 text-sm">
                    Esta acción <span class="font-semibold text-[#8B2F2F]">no se puede deshacer</span>. 
                    Todos los datos asociados serán eliminados permanentemente.
                </p>
            </div>

            <!-- Formulario de eliminación -->
            <form id="deleteForm" method="POST" action="controllers/alumnosController.php">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id_alumno" id="delete_id_alumno">

                <div class="flex gap-4 px-6 pb-6">
                    <button type="button" onclick="closeDeleteModal()"
                        class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 border-2 border-gray-200 hover:border-gray-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancelar
                    </button>

                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F] text-white py-3 rounded-xl font-semibold hover:from-[#6B1F1F] hover:to-[#5B0F0F] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Función para el acordeón móvil
        function toggleAccordion(id) {
            const accordion = document.getElementById(id);
            const icon = document.getElementById('icon' + id.replace('accordion', ''));

            if (accordion.classList.contains('hidden')) {
                accordion.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                accordion.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }

        // Base de datos simulada (en producción esto vendría del backend)
        const alumnos = {
            1: { id: 1, nombre: 'Jose Matias', anio: '2025', seccion: 'A', especialidad: 'Matemáticas', estado: 'Activo' },
            2: { id: 2, nombre: 'Maria Lopez', anio: '2025', seccion: 'B', especialidad: 'Ciencias', estado: 'Activo' },
            3: { id: 3, nombre: 'Karla', anio: '2024', seccion: 'C', especialidad: 'Historia', estado: 'Inactivo' },
            4: { id: 4, nombre: 'Brian', anio: '2023', seccion: 'A', especialidad: 'Lengua', estado: 'Activo' }
        };

        // Función para abrir el formulario en modo añadir
        function openAddForm() {
            document.getElementById('formModal').classList.remove('hidden');
            document.getElementById('accion').value = 'añadir';
            document.getElementById('formTitle').textContent = 'Añadir Alumno';
            
            // Limpiar el formulario
            document.getElementById('alumnoForm').reset();
            document.getElementById('id_alumno').value = '';
        }

        // Función para abrir el formulario en modo editar
        function openEditForm(id) {
            const alumno = alumnos[id];
            
            if (!alumno) {
                console.error('Alumno no encontrado');
                return;
            }

            document.getElementById('formModal').classList.remove('hidden');
            document.getElementById('accion').value = 'editar';
            document.getElementById('formTitle').textContent = 'Editar Alumno';
            
            // Llenar el formulario con los datos del alumno
            document.getElementById('id_alumno').value = alumno.id;
            document.getElementById('nombre').value = alumno.nombre;
            document.getElementById('anio').value = alumno.anio;
            document.getElementById('seccion').value = alumno.seccion;
            document.getElementById('especialidad').value = alumno.especialidad;
            document.getElementById('estado').value = alumno.estado;
        }

        // Función para cerrar el formulario
        function closeForm() {
            document.getElementById('formModal').classList.add('hidden');
            // Resetear posición del drag
            document.getElementById('formContainer').style.transform = 'translate3d(0px, 0px, 0px)';
            xOffset = 0;
            yOffset = 0;
        }

        // Función para abrir el modal de eliminación
        function openDeleteModal(id) {
            document.getElementById('delete_id_alumno').value = id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        // Función para cerrar el modal de eliminación
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Cerrar modales con la tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeForm();
                closeDeleteModal();
            }
        });

        // Cerrar modal al hacer clic fuera de él
        document.getElementById('formModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeForm();
            }
        });

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // ===== FUNCIONALIDAD DE ARRASTRE DEL MODAL =====
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
                dragHandle.style.cursor = 'grabbing';
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
            dragHandle.style.cursor = 'move';
        }

        function setTranslate(xPos, yPos, el) {
            el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0)`;
        }
    </script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }

        .draggable {
            user-select: none;
        }

        #dragHandle {
            cursor: move;
        }

        #dragHandle:active {
            cursor: grabbing;
        }
    </style>

</section>

<?php require_once 'views/plantillas/footer.php'; ?>