<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="mx-auto ps-5 px-20 sm:px-20 lg:px-20">
        {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> --}}
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                
                <div class="shrink-0 flex items-center">
                    <a class="navbar-brand" href="/">Autotec Servicios</a>
                    {{-- <a href="{{ route('/') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a> --}}
                </div>

                
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('Usuario') }}" :active="request()->routeIs('Usuario')">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>

                {{-- <div class="hidden sm:flex sm:items-center sm:ml-6 pt-1 ps-2 pe-2">
                    <x-dropdown align="center" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Autobuses</div>
                
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                
                        <x-slot name="content">
                            <x-dropdown-link :href="route('Autobus.index')" active="request()->routeIs('Autobus.index')">
                                {{ __('Autobuses') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Combustible') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Mantenimiento') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Seguros') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Inspecciones') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div> --}}

                {{-- <div class="hidden sm:flex sm:items-center sm:ml-6 pt-1 ps-2 pe-2">
                    <x-dropdown align="center" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Escuelas</div>
                
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                
                        <x-slot name="content">
                            <x-dropdown-link :href="route('Escuelas.index')" active="request()->routeIs('Escuelas.index')">
                                {{ __('Escuelas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Estudiantes') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Quejas - Sugerencias') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Pagos') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Asistencia Estudiantes') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div> --}}

                {{-- <div class="hidden sm:flex sm:items-center sm:ml-6 pt-1 ps-2 pe-2">
                    <x-dropdown align="center" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Empleados</div>
                
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                
                        <x-slot name="content">
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Empleados') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Contratos') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Capacitaciones') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Conductores') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Licencias') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div> --}}

                {{-- <div class="hidden sm:flex sm:items-center sm:ml-6 pt-1 ps-2 pe-2">
                    <x-dropdown align="center" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Viajes</div>
                
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                
                        <x-slot name="content">
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Viajes') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Rutas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Paradas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Horarios') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Licencias') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div> --}}


                {{-- <div class="hidden sm:flex sm:items-center sm:ml-6 pt-1 ps-2 pe-2">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Reportes</div>
                
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                
                        <x-slot name="content">
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Alumnos Ruta') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Paradas Ruta') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Alumnos Escuela') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inicio')" active="request()->routeIs('inicio')">
                                {{ __('Pagos Escuela') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div> --}}


                <!-- Navigation Links -->
                

                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-2 sm:flex">
                    <x-nav-link href="{{ route('CerrarSesion') }}" :active="request()->routeIs('CerrarSesion')">
                        {{ __('Cerrar Sesión') }}
                    </x-nav-link>
                </div> --}}

                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('Empleados.index') }}" :active="request()->routeIs('Empleados.index')">
                        {{ __('Empleados') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('Departamentos.index') }}" :active="request()->routeIs('Departamentos.index')">
                        {{ __('Departamentos') }}
                    </x-nav-link>
                </div> --}}
            </div>
            
            <!-- Hamburger -->
            <div class="-me-2 pe-4 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        {{-- <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('inicio') }}" :active="request()->routeIs('inicio')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
        </div> --}}

        {{-- <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>
        </div> --}}

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('Usuario') }}" :active="request()->routeIs('Usuario')">
                {{ __('Usuarios') }}
            </x-responsive-nav-link>
        </div>

       

        {{-- <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('Servicios.index') }}" :active="request()->routeIs('Servicios.index')">
                {{ __('Servicios') }}
            </x-responsive-nav-link>
        </div>

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('Contactanos.index') }}" :active="request()->routeIs('Contactanos.index')">
                {{ __('Consultas') }}
            </x-responsive-nav-link>
        </div>

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('CerrarSesion') }}" :active="request()->routeIs('CerrarSesion')">
                {{ __('Cerrar Sesión') }}
            </x-responsive-nav-link>
        </div> --}}

        {{-- <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('Empleados.index') }}" :active="request()->routeIs('Empleados.index')">
                {{ __('Empleados') }}
            </x-responsive-nav-link>
        </div>

        <div class="space-y-1">
            <x-responsive-nav-link href="{{ route('Departamentos.index') }}" :active="request()->routeIs('Departamentos.index')">
                {{ __('Departamentos') }}
            </x-responsive-nav-link>
        </div> --}}
    </div>
</nav>
