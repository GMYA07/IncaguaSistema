<?php
require_once 'views/plantillas/header.php';
require_once 'views/plantillas/navbar.php'; ?>

<div class="flex-1 ml-0 min-h-screen bg-gray-50 p-8">


    <!-- Título opcional -->
    <div class="mb-10">
        <h2 class="text-3xl font-bold text-gray-800">Panel de Control</h2>
        <p class="text-gray-600 mt-2">Resumen general del instituto</p>
        <div class="h-1 w-60 bg-red-800 rounded-full mt-4"></div>
    </div>

    <!-- Grid de cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 animate-fade-in pb-4">

        <!-- Total de Docentes -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <div class="flex items-start space-x-4">
                <div class="bg-purple-100 text-purple-600 rounded-xl p-3 flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h6 class="text-gray-600 text-sm font-medium mb-2">Total de Docentes</h6>
                    <p class="text-3xl font-bold text-gray-900 mb-2">189</p>
                    <small class="text-gray-500 text-xs">Sin incluir personal administrativo</small>
                </div>
            </div>
        </div>

        <!-- Total de Estudiantes -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <div class="flex items-start space-x-4">
                <div class="bg-blue-100 text-blue-600 rounded-xl p-3 flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h6 class="text-gray-600 text-sm font-medium mb-2">Total de Estudiantes</h6>
                    <p class="text-3xl font-bold text-gray-900 mb-2">298</p>
                    <small class="text-gray-500 text-xs">Incluyendo técnicos y generales</small>
                </div>
            </div>
        </div>

        <!-- Estudiantes con Deméritos -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <div class="flex items-start space-x-4">
                <div class="bg-red-100 text-red-600 rounded-xl p-3 flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h6 class="text-gray-600 text-sm font-medium mb-2">Estudiantes con Deméritos</h6>
                    <p class="text-3xl font-bold text-gray-900 mb-2">124</p>
                    <div class="flex items-center flex-wrap gap-1">
                        <span class="bg-red-100 text-red-600 font-semibold px-2 py-0.5 rounded text-xs">+3.0%</span>
                        <small class="text-gray-500 text-xs">Desde el mes pasado</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estudiantes en Recuperación -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <div class="flex items-start space-x-4">
                <div class="bg-green-100 text-green-600 rounded-xl p-3 flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h6 class="text-gray-600 text-sm font-medium mb-2">Estudiantes en Recuperación</h6>
                    <p class="text-3xl font-bold text-gray-900 mb-2">35</p>
                    <div class="flex items-center flex-wrap gap-1">
                        <span class="bg-green-100 text-green-600 font-semibold px-2 py-0.5 rounded text-xs">+10.6%</span>
                        <small class="text-gray-500 text-xs">Desde el mes pasado</small>
                    </div>
                </div>
            </div>
        </div>










    </div>

    <!-- Sección de Tabla -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 ">

        <!-- Header de la tabla con título y controles -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Estudiantes con Más Deméritos</h3>
                <p class="text-sm text-gray-500 mt-1">Registro de estudiantes con comportamiento a mejorar</p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <!-- Filtro por cantidad -->
                <div class="relative">
                    <select class="appearance-none bg-gray-50 border border-gray-200 text-gray-700 py-2 pl-4 pr-10 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-blue-500 cursor-pointer transition-colors">
                        <option value="5">Top 5 estudiantes</option>
                        <option value="10" selected>Top 10 estudiantes</option>
                        <option value="20">Top 20 estudiantes</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>

                <!-- Botón Exportar PDF -->
                <button class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Exportar PDF
                </button>

                <!-- Botón Exportar Excel -->
                <button class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Exportar Excel
                </button>

                <!-- Botón Imprimir -->
                <button class="flex items-center gap-2 bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Imprimir
                </button>
            </div>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Alumno
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Profesor Registrado
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total de Deméritos
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-semibold">
                                        JG
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Juan García Martínez</div>
                                    <div class="text-sm text-gray-500">2° Año General</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. María Rodríguez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                45 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                        AL
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Ana López Hernández</div>
                                    <div class="text-sm text-gray-500">1° Año Técnico</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Carlos Méndez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">09/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                38 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-semibold">
                                        MR
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Miguel Ramírez Santos</div>
                                    <div class="text-sm text-gray-500">3° Año General</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Laura Martínez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">08/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                32 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 font-semibold">
                                        SF
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Sofía Flores Ramos</div>
                                    <div class="text-sm text-gray-500">2° Año Técnico</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Roberto Silva</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">07/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                28 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-semibold">
                                        DC
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Diego Castro Morales</div>
                                    <div class="text-sm text-gray-500">1° Año General</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Patricia Gómez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">06/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                25 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">6</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 font-semibold">
                                        VT
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Valeria Torres Cruz</div>
                                    <div class="text-sm text-gray-500">3° Año Técnico</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Fernando Vega</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">05/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                22 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">7</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-semibold">
                                        AR
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Andrés Ruiz Pérez</div>
                                    <div class="text-sm text-gray-500">2° Año General</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Isabel Navarro</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">04/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                20 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">8</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-semibold">
                                        CM
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Carolina Mora Jiménez</div>
                                    <div class="text-sm text-gray-500">1° Año Técnico</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Javier Ortiz</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                18 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">9</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-semibold">
                                        RP
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Ricardo Paredes Vega</div>
                                    <div class="text-sm text-gray-500">3° Año General</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Ana Castillo</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">02/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                16 puntos
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">10</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-cyan-100 flex items-center justify-center text-cyan-600 font-semibold">
                                        LS
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Lucía Sánchez Díaz</div>
                                    <div class="text-sm text-gray-500">2° Año Técnico</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Prof. Marco Torres</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">01/10/2025</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                15 puntos
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Footer de paginación -->
        <div class="flex flex-col md:flex-row items-center justify-between mt-6 pt-4 border-t border-gray-200">
            <div class="text-sm text-gray-700 mb-4 md:mb-0">
                Mostrando <span class="font-medium">1</span> a <span class="font-medium">10</span> de <span class="font-medium">124</span> resultados
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    Anterior
                </button>
                <button class="px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg">
                    1
                </button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    2
                </button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    3
                </button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Siguiente
                </button>
            </div>
        </div>

    </div>

</div>








</div>
</div>

<?php require_once 'views/plantillas/footer.php'; ?>