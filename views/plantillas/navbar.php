<nav class="bg-gradient-to-b from-[#8B1A1A] to-[#6e1515] p-6 h-screen w-full max-w-64 flex flex-col items-center shadow-2xl">
    
    <div class="flex items-center justify-center mb-8 bg-white rounded-full p-6 h-48 w-48 shadow-2xl ring-4 ring-white/20 hover:scale-105 transition-transform duration-300">
        <img class="h-full w-full object-contain" src="./public/Assets/img/logoIncagua.png" alt="INCAGUA Logo">
    </div>

    
    <div class="flex flex-col gap-3 w-full">
        
        
        <a href="<?php echo BASE_URL; ?>?pagina=inicioDocente" 
           class="group relative text-white px-6 py-4 rounded-lg hover:bg-white/10 transition-all duration-300 flex items-center gap-3 overflow-hidden">
            <span class="absolute left-0 top-0 h-full w-1 bg-white scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-top"></span>
            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="font-medium group-hover:translate-x-1 transition-transform duration-300">Inicio</span>
        </a>

        <!-- Alumnos -->
        <a href="<?php echo BASE_URL; ?>?pagina=listarAlumnos" 
           class="group relative text-white px-6 py-4 rounded-lg hover:bg-white/10 transition-all duration-300 flex items-center gap-3 overflow-hidden">
            <span class="absolute left-0 top-0 h-full w-1 bg-white scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-top"></span>
            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <span class="font-medium group-hover:translate-x-1 transition-transform duration-300">Alumnos</span>
        </a>

        <!-- Registrar Demeritos -->
        <a href="<?php echo BASE_URL; ?>?pagina=registrarDemeritos" 
           class="group relative text-white px-6 py-4 rounded-lg hover:bg-white/10 transition-all duration-300 flex items-center gap-3 overflow-hidden">
            <span class="absolute left-0 top-0 h-full w-1 bg-white scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-top"></span>
            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span class="font-medium group-hover:translate-x-1 transition-transform duration-300">Registrar Demeritos</span>
        </a>
    </div>

    <!-- Cerrar Sesión (al final) -->
    <div class="mt-auto w-full pt-6 border-t border-white/20">
        <a href="<?php echo BASE_URL; ?>?pagina=logout" 
           class="group relative text-white px-6 py-4 rounded-lg hover:bg-red-900/50 transition-all duration-300 flex items-center gap-3 overflow-hidden">
            <span class="absolute left-0 top-0 h-full w-1 bg-white scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-top"></span>
            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="font-medium group-hover:translate-x-1 transition-transform duration-300">Cerrar Sesión</span>
        </a>
    </div>

</nav>