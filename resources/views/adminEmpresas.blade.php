<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistema de almacenes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Panel de administración de Empresas</h1>

                @if ( session('mensaje') )
                    <div class="alert alert-{{ (session('danger'))?'danger':'success' }}">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <table class="table-auto w-full table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th>
                                <div class="flex items-center">Empreza</div>
                            </th>
                            <th>
                                <div class="flex items-center">Pais</div>
                            </th>
                            <th>
                                <div class="flex items-center">Ciudad</div>
                            </th>
                            <th>
                                <div class="flex items-center">Dirección</div>
                            </th>
                            <th>
                                <div class="flex items-center">NIT</div>
                            </th>
                            <th colspan="2">
                                <a href="/agregarEmpresa" class="btn btn-outline-secondary">
                                    Agregar
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach( $Empresas as $empresa )
                        <tr>
                            <td class="rounded border px-4 py2">{{ $empresa->idEmpresa }}</td>
                            <td class="rounded border px-4 py2">{{ $empresa->empNombre }}</td>
                            <td class="rounded border px-4 py2">{{ $empresa->empPais }}</td>
                            <td class="rounded border px-4 py2">{{ $empresa->empCiudad }}</td>
                            <td class="rounded border px-4 py2">{{ $empresa->empDireccion }}</td>
                            <td class="rounded border px-4 py2">{{ $empresa->empNit }}</td>
                            <td>
                                <a href="/modificarEmpresa/{{ $empresa->idEmpresa }}" class="btn btn-outline-secondary">
                                    Modificar
                                </a>
                            </td>
                            <td>
                                <a href="/eliminarEmpresa/{{ $empresa->idEmpresa }}" class="btn btn-outline-secondary">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $Empresas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
