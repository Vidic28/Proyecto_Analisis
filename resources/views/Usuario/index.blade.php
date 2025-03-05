<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="ps-5 pe-5 mx-auto sm:px-20 lg:px-20">            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="about_section " style="height: 100vh">
                    <br>
                    <div class="col-md-12 pe-5 ps-5">
                        <div class="row col-md-12">
                            <div class="col-5 align-content-center">
                                <a data-bs-toggle="modal" data-bs-target="#modalGuardar"
                                    class="btn btn-primary col-md-5">Nuevo Registro</a>
                            </div>
                        </div>


                        <div class="col-md-12 mt-4">

                            <div class="row table-responsive">
                                <table class="table">
                                    <thead class="table-dark text-white">
                                        <tr>
                                            <th class="px-4 py-2 text-white text-center">ID</th>
                                            <th class="px-4 py-2 text-white text-center">Usuario</th>
                                            <th class="px-4 py-2 text-white text-center">Contraseña</th>
                                            <th class="px-4 py-2 text-white text-center">Editar</th>
                                            <th class="px-4 py-2 text-white text-center">Eliminar</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (true == (isset($usuarios) ? $usuarios : null))
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $usuario->id }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $usuario->name }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ $usuario->password }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modalEditar{{ $usuario->id }}"
                                                        class="d-flex justify-content-center mt-1" href="">
                                                        <img src="icons/pencil-fill.svg" alt="editar" width="18"
                                                            height="18">
                                                    </a>
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#confirm-delete{{ $usuario->id }}"
                                                        class="d-flex justify-content-center mt-1" href="">
                                                        <img src="icons/trash-fill.svg" alt="eliminar" width="18"
                                                            height="18">
                                                    </a>
                                                </td>

                                                <!-- Modal Editar-->
                                                <div class="modal fade" id="modalEditar{{ $usuario->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Modificar
                                                                    Empleado</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="POST"
                                                                    action="{{ route('ActualizarUsuario', $usuario->id) }}"
                                                                    class="max-w-sm mx-auto">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group mb-2">
                                                                        <label for="nombre"
                                                                            class="block mb-2 text-sm font-medium text-gray-900">Nombre de Usuario</label>
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                            <input type="text" class="form-control"
                                                                                id="name"
                                                                                name="name"
                                                                                value="{{ $usuario->name }}"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-2">
                                                                        <label for="nombre"
                                                                            class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                                                                        <div
                                                                            class="col-sm-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                            <input type="text" class="form-control"
                                                                                id="password"
                                                                                name="password"
                                                                                value="{{ $usuario->password }}"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">Guardar
                                                                            Cambios</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Editar-->


                                                <!-- Modal Eliminar-->

                                                <div class="modal fade"
                                                    id="confirm-delete{{ $usuario->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Eliminar
                                                                    Paciente</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="POST"
                                                                    action="{{ route('EliminarUsuario', $usuario->id) }}"
                                                                    class="max-w-sm mx-auto">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <div class="modal-body">
                                                                        ¿Desea eliminar este registro?
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-bs-dismiss="modal">Cancelar</button>

                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-ok">Borrar</button>
                                                                        {{-- <a type="submit" class="btn btn-danger btn-ok">Borrar</a> --}}
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Eliminar-->

                                            </tr>
                                    </tbody>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        <!-- Modal Insertar-->
        <div class="modal fade" id="modalGuardar" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{-- <form method="POST" action="{{ route('Crear-usuario') }}" class="max-w-sm mx-auto"> --}}
                            <form method="POST" action="" class="max-w-sm mx-auto">
                        @csrf

                            <div class="form-group mb-2">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900">Nombre de Usuario</label>
                                <div
                                    class="col-sm-12 bg-gray-50 border border-gray-300 text-sm rounded-lg ">
                                    <input type="text" class="form-control"
                                        id="name"
                                        name="name"                                        
                                        required>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                                <div
                                class="col-sm-12 bg-gray-50 border border-gray-300 text-sm rounded-lg ">
                                    <input type="text" class="form-control"
                                        id="password"
                                        name="password"                                        
                                        required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button"
                                    class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center btn btn-secondary"
                                    data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit"
                                    class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center">Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal Insertar-->

    </div>
    </div>
</x-app-layout>
