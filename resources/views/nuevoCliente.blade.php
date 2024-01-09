<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    {{-- <x-application-logo class="block h-12 w-auto" /> --}}
            
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        FORMULARIO REGISTRO DE CLIENTES
                    </h1>
                </div>
            
                <div class="bg-gray-200 bg-opacity-25 pb-60">
                    
                    <form action="{{ route('crearCliente') }}" method="POST">
                        @csrf
                        <div class="px-6 flex flex-col">
                        
                            {{-- DATOS CLIENTE --}}
                            <h2 class="px-2 mt-16 text-treverdo-600 border-b-4 border-treverdo-700 font-bold text-xl">Datos del Cliente:</h2>
                            <div class="md:grid md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block mt-4 text-gray-600" for="nombreApellido">Nombre y Apellidos:</label>
                                    <input class="w-full" type="text" id="nombreApellido" name="nombreApellido">
                                </div>
                                <div>
                                    <label class="block mt-4 text-gray-600" for="nie">CIF / DNI / NIE</label>
                                    <input class="w-full" type="text" id="nie" name="nie">
                                </div>
                            </div>    
                            <div class="md:grid md:grid-cols-2 gap-8"> 
                                <div>
                                    <label class="block mt-4 text-gray-600" for="email">Correo Electrónico</label>
                                    <input class="w-full" type="text" id="email" name="email">
                                </div>
                                <div>
                                    <label class="block mt-4 text-gray-600" for="telefono">Telefono</label>
                                    <input class="w-full" type="tel" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div>
                                <label class="block mt-4 text-gray-600" for="direccionCliente">Dirección</label>
                                <input class="w-full" type="text" id="direccionCliente" name="direccionCliente">
                            </div>
                            
                            <x-button class="mt-4">Enviar</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>    