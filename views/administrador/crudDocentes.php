<?php
require_once 'views/plantillas/header.php';
require_once 'views/plantillas/navbar.php'; ?>


<section class="p-15">
    <!-- Buscador -->
    <div class="flex mb-4 gap-2">
        <input type="text" placeholder="🔍 Buscar docente"
            class="flex-1 p-3 rounded-full border border-gray-400 shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500" />
        <button onclick="openAddForm()" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition cursor-pointer"><i class="fas fa-plus mr-1"></i> Agregar</button>
    </div>

    <!-- Sección de tabla -->
    <section class="container mx-auto">

        <!-- Tabla para pantallas grandes -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-primary to-secondary text-white p-4">
                <h5 class="text-xl font-semibold"><i class="fas fa-users mr-2"></i>Listado de Docentes</h5>
            </div>

            <div class="lg:block hidden overflow-auto h-[550px] p-6">
                <div id="docentesList">
                    <!-- Docente 1 -->
                    <?php if (empty($docentes)): ?>
                        <div class="text-center py-8">
                            <p class="text-gray-500">No hay docentes registrados</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($docentes as $docente): ?>
                            <div class="bg-white rounded-lg p-6 mb-4 shadow-md hover:shadow-xl transition-all duration-300 hover:translate-x-2 border-l-4 border-accent">
                                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                                    <!-- Nombre y NIE -->
                                    <div class="md:col-span-3">
                                        <h6 class="font-bold text-gray-800 mb-1">
                                            <?php echo htmlspecialchars($docente['nombre_usuario'] . ' ' . $docente['apellido_usuario']); ?>
                                        </h6>
                                        <small class="text-gray-500">
                                            <i class="fas fa-id-card mr-1"></i>NIE: <?php echo htmlspecialchars($docente['nie_usuario']); ?>
                                        </small>
                                    </div>

                                    <!-- Sección (si la tienes en la BD) -->
                                    <div class="md:col-span-2 text-center">
                                        <small class="text-gray-500 block mb-1">Sección:</small>
                                        <strong class="text-gray-800"><?php echo !empty($docente['tipo_grado']) ? htmlspecialchars($docente['tipo_grado'] . ' ' . $docente['seccion_grado'] . ' - ' . $docente['especialidad_grado']) : 'Sin asignar'; ?></strong>
                                    </div>

                                    <!-- Usuario -->
                                    <div class="md:col-span-2 text-center">
                                        <small class="text-gray-500 block mb-1">Usuario:</small>
                                        <strong class="text-gray-800"><?php echo htmlspecialchars($docente['user']); ?></strong>
                                    </div>

                                    <!-- Estado -->
                                    <div class="md:col-span-2 text-center">
                                        <?php if ($docente['estado_usuario'] == 1): ?>
                                            <span class="inline-block px-4 py-2 bg-green-500 text-white rounded-full font-semibold text-sm">
                                                <i class="fas fa-check-circle mr-1"></i>Activo
                                            </span>
                                        <?php else: ?>
                                            <span class="inline-block px-4 py-2 bg-red-500 text-white rounded-full font-semibold text-sm">
                                                <i class="fas fa-times-circle mr-1"></i>Inactivo
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Botones -->
                                    <div class="md:col-span-3 text-center md:text-right">
                                        <div class="flex gap-2 justify-end">
                                            <button
                                                data-docente='<?php echo json_encode([
                                                                    "id" => $docente["id_usuario"],
                                                                    "nombre" => $docente["nombre_usuario"],
                                                                    "apellidos" => $docente["apellido_usuario"],
                                                                    "nie" => $docente["nie_usuario"],
                                                                    "seccion" => $docente["id_grado"] ?? "",
                                                                    "seccionNombre" => !empty($docente['tipo_grado'])
                                                                        ? $docente['tipo_grado'] . ' ' . $docente['seccion_grado'] . ' - ' . $docente['especialidad_grado']
                                                                        : "",
                                                                    "usuario" => $docente["user"]
                                                                ]); ?>'
                                                onclick="openEditForm(JSON.parse(this.dataset.docente))"
                                                <?php echo $docente['estado_usuario'] == 0 ? 'disabled' : ''; ?>
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold transition-all 
                                                <?php echo $docente['estado_usuario'] == 0 ? 'opacity-50 cursor-not-allowed' : ''; ?>">
                                                <i class="fas fa-edit mr-1"></i>Editar
                                            </button>
                                            <?php if ($docente['estado_usuario'] == 1): ?>
                                                <!-- Botón para Desactivar -->
                                                <button onclick="openDeleteForm(<?php echo $docente['id_usuario']; ?>, <?php echo $docente['estado_usuario']; ?>)"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold transition-all duration-300 hover:scale-105">
                                                    <i class="fas fa-user-slash mr-1"></i>Desactivar
                                                </button>
                                            <?php else: ?>
                                                <!-- Botón para Activar -->
                                                <button onclick="openDeleteForm(<?php echo $docente['id_usuario']; ?>, <?php echo $docente['estado_usuario']; ?>)"
                                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold transition-all duration-300 hover:scale-105">
                                                    <i class="fas fa-user-check mr-1"></i>Activar
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div id="noResults" class="hidden text-center py-12 text-gray-500">
                    <i class="fas fa-search text-6xl mb-4"></i>
                    <p class="text-lg">No se encontraron docentes que coincidan con la búsqueda</p>
                </div>
            </div>
        </div>

        <!-- Vista móvil - Acordeón -->
        <div class="block lg:hidden space-y-3 overflow-auto h-[550px] mt-6">
            <?php if (empty($docentes)): ?>
                <div class="text-center py-8">
                    <p class="text-gray-500">No hay docentes registrados</p>
                </div>
            <?php else: ?>
                <?php foreach ($docentes as $index => $docente): ?>
                    <!-- Card docente -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-50 transition border-l-4 border-accent"
                            onclick="toggleAccordion('accordion<?php echo $index; ?>')">
                            <div class="flex-1">
                                <h3 class="font-semibold text-lg">
                                    <?php echo htmlspecialchars($docente['nombre_usuario'] . ' ' . $docente['apellido_usuario']); ?>
                                </h3>
                                <p class="text-sm text-gray-600">
                                    NIE: <?php echo htmlspecialchars($docente['nie_usuario']); ?> |
                                    Sección: <?php echo htmlspecialchars($docente['seccion'] ?? 'N/A'); ?>
                                </p>
                                <span class="inline-block mt-1 px-2 py-1 text-xs <?php echo $docente['estado_usuario'] == 1 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> rounded">
                                    <?php echo $docente['estado_usuario'] == 1 ? 'Activo' : 'Inactivo'; ?>
                                </span>
                            </div>
                            <svg id="icon<?php echo $index; ?>" class="w-6 h-6 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>

                        <div id="accordion<?php echo $index; ?>" class="hidden border-t border-gray-200">
                            <div class="p-4 bg-gray-50">
                                <div class="space-y-2 text-sm">
                                    <p><span class="font-semibold">Nombre:</span> <?php echo htmlspecialchars($docente['nombre_usuario']); ?></p>
                                    <p><span class="font-semibold">Apellidos:</span> <?php echo htmlspecialchars($docente['apellido_usuario']); ?></p>
                                    <p><span class="font-semibold">NIE:</span> <?php echo htmlspecialchars($docente['nie_usuario']); ?></p>
                                    <p><span class="font-semibold">Sección:</span> <?php echo !empty($docente['tipo_grado']) ? htmlspecialchars($docente['tipo_grado'] . ' ' . $docente['seccion_grado'] . ' - ' . $docente['especialidad_grado']) : 'Sin asignar'; ?></p>
                                    <p><span class="font-semibold">Usuario:</span> <?php echo htmlspecialchars($docente['user']); ?></p>
                                    <p><span class="font-semibold">Rol:</span> <span class="text-blue-600"><?php echo htmlspecialchars($docente['rol']); ?></span></p>
                                </div>
                                <div class="flex gap-2 mt-4">
                                    <button
                                        data-docente='<?php echo json_encode([
                                                            "id" => $docente["id_usuario"],
                                                            "nombre" => $docente["nombre_usuario"],
                                                            "apellidos" => $docente["apellido_usuario"],
                                                            "nie" => $docente["nie_usuario"],
                                                            "seccion" => $docente["id_grado"] ?? "",
                                                            "seccionNombre" => !empty($docente['tipo_grado'])
                                                                ? $docente['tipo_grado'] . ' ' . $docente['seccion_grado'] . ' - ' . $docente['especialidad_grado']
                                                                : "",
                                                            "usuario" => $docente["user"]
                                                        ]); ?>'
                                        onclick="openEditForm(JSON.parse(this.dataset.docente))"
                                        <?php echo $docente['estado_usuario'] == 0 ? 'disabled' : ''; ?>
                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm 
                                        <?php echo $docente['estado_usuario'] == 0 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'; ?>">
                                        <i class="fas fa-edit mr-1"></i>Editar
                                    </button>
                                    <?php if ($docente['estado_usuario'] == 1): ?>
                                        <!-- Botón para Desactivar -->
                                        <button onclick="openDeleteForm(<?php echo $docente['id_usuario']; ?>, <?php echo $docente['estado_usuario']; ?>)"
                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm cursor-pointer">
                                            <i class="fas fa-user-slash mr-1"></i>Desactivar
                                        </button>
                                    <?php else: ?>
                                        <!-- Botón para Activar -->
                                        <button onclick="openDeleteForm(<?php echo $docente['id_usuario']; ?>, <?php echo $docente['estado_usuario']; ?>)"
                                            class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition text-sm cursor-pointer">
                                            <i class="fas fa-user-check mr-1"></i>Activar
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <section>
        <div id="formModal" class="hidden fixed inset-0 bg-opacity-60 flex items-center justify-center z-50 p-4" method="POST">
            <div id="formContainer" class="bg-white rounded-2xl shadow-2xl w-full max-w-xl max-h-[100vh] relative overflow-hidden animate-fadeIn flex flex-col">

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
                    <p class="text-white/80 text-sm mt-1">Complete la información del docente</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-8 overflow-y-auto flex-1">
                    <!-- Formulario -->
                    <form id="docenteForm" action="<?php echo BASE_URL; ?>?pagina=agregarDocente" method="POST" class="space-y-6">
                        <input type="hidden" name="id_docente" id="id_docente">
                        <input type="hidden" name="accion" id="accion" value="añadir">

                        <!-- Nombre -->
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-semibold text-sm">
                                <span id="nombreDocente" class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                                    </svg>
                                    Nombre
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" name="nombre" id="nombre" required placeholder="Ingrese el nombre"
                                    class="w-full px-4 py-3 pl-10 bg-gray-50 border-2 border-gray-200 
                rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-semibold text-sm">
                                <span id="apellidosDocente" class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                                    </svg>
                                    Apellidos
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" name="apellidos" id="apellidos" required placeholder="Ingrese los apellidos"
                                    class="w-full px-4 py-3 pl-10 bg-gray-50 border-2 border-gray-200 
                rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>

                        <!-- NIE y Sección -->
                        <div class="grid grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-gray-700 font-semibold text-sm">
                                    <span id="NIEDocente" class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z" />
                                        </svg>
                                        NIE
                                    </span>
                                </label>
                                <input type="text" name="nie" id="nie" required placeholder="12345678-9"
                                    class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 
                rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-gray-700 font-semibold text-sm">
                                    <span id="seccionDocente" class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
                                        </svg>
                                        Sección
                                    </span>
                                </label>
                                <div class="relative">
                                    <select name="seccion" id="seccion"
                                        class="w-full px-4 py-3 pl-10 bg-gradient-to-r from-gray-50 to-gray-100 border-2 
                border-gray-200 rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none appearance-none cursor-pointer font-medium transition-all duration-200">
                                        <option value="" selected>Ninguno</option>
                                        <?php foreach ($secciones as $seccion): ?>
                                            <option value="<?= $seccion['id_grado'] ?>"><?= $seccion['tipo_grado'] . ' ' . $seccion['seccion_grado'] . ' - ' . $seccion['especialidad_grado'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5 pointer-events-none" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <svg class="w-5 h-5 text-[#8B2F2F] absolute right-3 top-3.5 pointer-events-none" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M7 10l5 5 5-5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Usuario -->
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-semibold text-sm">
                                <span id="usuarioDocente" class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                    </svg>
                                    Usuario
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" name="usuario" id="usuario" required placeholder="nombre.usuario"
                                    class="w-full px-4 py-3 pl-10 bg-gray-50 border-2 border-gray-200 
                rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="space-y-2">
                            <label class="block text-gray-700 font-semibold text-sm">
                                <span id="contrasenaDocente" class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#8B2F2F]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                                    </svg>
                                    Contraseña
                                </span>
                            </label>
                            <div class="relative">
                                <input type="password" name="contrasena" id="contrasena" required placeholder="••••••••"
                                    class="w-full px-4 py-3 pl-10 bg-gray-50 border-2 border-gray-200 
                rounded-xl focus:border-[#8B2F2F] focus:bg-white focus:outline-none transition-all duration-200">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
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
        </div>


        <!-- MODAL DE ELIMINACIÓN -->
        <div id="deleteModal" class="hidden fixed inset-0 bg-opacity-60 flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative overflow-hidden animate-fadeIn">

                <!-- Header dinámico -->
                <div id="modalHeader" class="flex items-center gap-3 px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F]">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-white" id="tituloFormActivarDesactivar">Cambiar estado</h2>
                </div>

                <div class="p-6 text-center space-y-4">
                    <p class="text-gray-700 text-sm" id="preguntaFormActivarDesactivar">
                        ¿Estás seguro de que deseas realizar esta acción?
                    </p>
                </div>

                <form id="deleteForm" method="POST" action="<?php echo BASE_URL; ?>?pagina=cambiarEstadoDocente">
                    <input type="hidden" name="accion" value="cambiar_estado">
                    <input type="hidden" name="id_docente" id="delete_id_docente">
                    <input type="hidden" name="estado_actual" id="delete_estado_docente">

                    <div class="flex gap-4 px-6 pb-6">
                        <button type="button" onclick="closeDeleteModal()"
                            class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 border-2 border-gray-200 hover:border-gray-300 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancelar
                        </button>

                        <button type="submit" id="botonSubmitModal"
                            class="flex-1 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F] text-white py-3 rounded-xl font-semibold hover:from-[#6B1F1F] hover:to-[#5B0F0F] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Confirmar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php if (isset($msg)): ?>
        <script>
            AlertHelper.show('docente', <?php echo json_encode($msg); ?>);
        </script>
    <?php endif; ?>

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
        // datos simulados de una base datos

        function openAddForm() {
            document.getElementById('formModal').classList.remove('hidden');
            document.getElementById('accion').value = 'añadir';
            document.getElementById('formTitle').textContent = 'Añadir Docente';

            // Limpiar el formulario
            document.getElementById('docenteForm').reset();
            document.getElementById('id_docente').value = '';
        }



        function openEditForm(data) {
            document.getElementById('formModal').classList.remove('hidden');
            document.getElementById('accion').value = 'editar';
            document.getElementById('formTitle').textContent = 'Editar Docente';
            document.getElementById('docenteForm').action = '<?php echo BASE_URL; ?>?pagina=editarDocente';

            document.getElementById('id_docente').value = data.id;
            document.getElementById('nombre').value = data.nombre;
            document.getElementById('apellidos').value = data.apellidos;
            document.getElementById('nie').value = data.nie;
            document.getElementById('usuario').value = data.usuario;

            const selectSeccion = document.getElementById('seccion');

            // Si tiene sección, agregarla temporalmente al select
            if (data.seccion && data.seccionNombre) {
                // Verificar si ya existe
                let exists = false;
                for (let option of selectSeccion.options) {
                    if (option.value === data.seccion) {
                        exists = true;
                        break;
                    }
                }

                // Si no existe, crearla
                if (!exists) {
                    const option = document.createElement('option');
                    option.value = data.seccion;
                    option.text = data.seccionNombre;
                    selectSeccion.insertBefore(option, selectSeccion.options[1]);
                }
            }

            selectSeccion.value = data.seccion || '';

            const contrasenaInput = document.getElementById('contrasena');
            contrasenaInput.removeAttribute('required');
            contrasenaInput.value = '';
            contrasenaInput.placeholder = 'Dejar vacío para no cambiar';
        }
        // Abre el modal de eliminación y establece el ID del docente a eliminar
        function openDeleteForm(id, estado) {
            document.getElementById('delete_id_docente').value = id;
            document.getElementById('delete_estado_docente').value = estado;

            const titulo = document.getElementById('tituloFormActivarDesactivar');
            const pregunta = document.getElementById('preguntaFormActivarDesactivar');
            const header = document.querySelector('#deleteModal .bg-gradient-to-r');
            const botonSubmit = document.querySelector('#deleteForm button[type="submit"]');
            const iconoSubmit = botonSubmit.querySelector('svg');

            if (estado == 1) {
                // Desactivar
                titulo.textContent = 'Desactivar docente';
                pregunta.textContent = '¿Estás seguro de que deseas desactivar este docente?';
                header.className = 'flex items-center gap-3 px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F]';
                botonSubmit.className = 'flex-1 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F] text-white py-3 rounded-xl font-semibold hover:from-[#6B1F1F] hover:to-[#5B0F0F] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2';
                botonSubmit.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </svg>
        Desactivar
    `;
            } else {
                // Activar
                titulo.textContent = 'Activar docente';
                pregunta.textContent = '¿Estás seguro de que deseas activar este docente?';
                header.className = 'flex items-center gap-3 px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F]';
                botonSubmit.className = 'flex-1 bg-gradient-to-r from-[#8B2F2F] to-[#6B1F1F] text-white py-3 rounded-xl font-semibold hover:from-[#6B1F1F] hover:to-[#5B0F0F] transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2';
                botonSubmit.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Activar
    `;
            }

            document.getElementById('deleteModal').classList.remove('hidden');
        }

        // Cierra el modal
        function closeForm() {
            document.getElementById('formModal').classList.add('hidden');

            // Vaciar el formulario con los datos del docente
            document.getElementById('id_docente').value = '';
            document.getElementById('nombre').value = '';
            document.getElementById('apellidos').value = '';
            document.getElementById('nie').value = '';
            document.getElementById('seccion').value = 'A';
            document.getElementById('usuario').value = '';
            document.getElementById('rol').value = 'Docente';
        }

        // Función para alternar acordeón en vista móvil
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
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Cerrar modal al hacer clic fuera de él
        document.getElementById('formModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeForm();
            }
        });
    </script>



    <?php require_once 'views/plantillas/footer.php'; ?>