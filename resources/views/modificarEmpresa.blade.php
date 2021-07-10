<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sistema de almacenes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                <h1>Modificar Empresa</h1>
            </div>

            <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

                <form action="/modificarEmpresa" method="post">
                @csrf
                @method('put')
                    <input type="hidden" name="idEmpresa"
                        value="{{ $Empresa->idEmpresa }}"
                        class="flex form-input rounded-md shadow-sm mt-1 block w-full" id="idEmpresa">

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empNombre">Nombre de la Empresa</label>
                        
                        <input type="text" name="empNombre"
                               value="{{ old('empNombre', $Empresa->empNombre) }}"
                               class="flex form-input rounded-md shadow-sm mt-1 block w-full" id="empNombre">
                    </div>
                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empNombre">NIT</label>
                        
                        <input type="text" name="empNit"
                               value="{{ old('empNit', $Empresa->empNit) }}"
                               class="flex form-input rounded-md shadow-sm mt-1 block w-full" id="empNit">
                    </div>

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empPais">Pais</label>
                        
                        <input type="text" name="empPais"
                               value="{{ old('empPais', $Empresa->empPais) }}"
                               class="form-input rounded-md shadow-sm mt-1 block w-full" id="empPais">
                    </div>

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empCiudad">Ciudad</label>
                        
                        <input type="text" name="empCiudad"
                               value="{{ old('empCiudad', $Empresa->empCiudad) }}"
                               class="form-input rounded-md shadow-sm mt-1 block w-full" id="empCiudad">
                    </div>

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empDireccion">Dirección</label>
                        
                        <input type="text" name="empDireccion"
                               value="{{ old('empDireccion', $Empresa->empDireccion) }}"
                               class="form-input rounded-md shadow-sm mt-1 block w-full" id="empDireccion">
                    </div>

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empTelefono">Teléfono</label>
                        
                        <input type="text" name="empTelefono"
                               value="{{ old('empTelefono', $Empresa->empTelefono) }}"
                               class="form-input rounded-md shadow-sm mt-1 block w-full" id="empTelefono">
                    </div>

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empPeriodo">Periodo</label>
                        
                        <input type="number" name="empPeriodo"
                               value="{{ old('empPeriodo', $Empresa->empPeriodo) }}"
                               class="form-input rounded-md shadow-sm mt-1 block w-full" id="empPeriodo">
                    </div>

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empInicio">Fecha de Inicio</label>
                        
                        <input type="date" name="empInicio"
                               value="{{ old('empInicio', $Empresa->empInicio) }}"
                               class="form-input rounded-md shadow-sm mt-1 block w-full" id="empInicio">
                    </div>

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <label for="empCierre">Fecha de cierre</label>
                        
                        <input type="date" name="empCierre"
                               value="{{ old('empCierre', $Empresa->empCierre) }}"
                               class="form-input rounded-md shadow-sm mt-1 block w-full" id="empCierre">
                    </div>

                    <div class="bg-white px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                        <button class="bg-black px-3 py-2 border-t border-gray-200 sm:rounded-lg">Modificar empresa</button>
                        <a href="/adminEmpresas" class="bg-black px-3 py-2 border-t border-gray-200 sm:rounded-lg">
                            Volver a panel
                        </a>
                    </div>
                </form>
            </div>
            @if( $errors->any() )
                <div class="alert alert-danger col-8 mx-auto p-2">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        
        </div>
    </div>
</x-app-layout>