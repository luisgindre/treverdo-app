<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    {{-- <x-application-logo class="block h-12 w-auto" /> --}}

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Bienvenido a la plataforma de Treverdo!
    </h1>
    <h2 class="mt-8 text-xl font-medium text-gray-900">
        Formulario Alta de Proyecto
    </h2>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <form class="w-full max-w-lg">
            <div class="w-full mb-6">
                <label class="text-gray-700 text-sm font-bold mb-2" for="">
                    Textura del suelo
                </label>
                <div>
                    <select class="w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </div>
            <div class="w-full mb-6">
                <label class=" text-gray-700 text-sm font-bold mb-2">
                    Profundidad util
                </label>
                <div class="flex border border-gray-500">
                    <input type="number" class="">
                    <span class="block border border-gray-500">m</span>
                </div>
            </div>
            <div class="w-full mb-6">
                <label class=" text-gray-700 text-sm font-bold mb-2">
                    Porcentaje de pedregosidad
                </label>
                <input type="number" class="w-full">
            </div>
          
        </form>
    </div>
</div>
