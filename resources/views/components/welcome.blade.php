<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    {{-- <x-application-logo class="block h-12 w-auto" /> --}}

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        FORMULARIO REGISTRO DE CLIENTES
    </h1>
</div>

<div class="bg-gray-200 bg-opacity-25 pb-60">
    <div class="flex justify-center">
        <form>
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

                {{-- DATOS INSTALACON --}}
                <h2 class="px-2 mt-16 text-treverdo-600 border-b-4 border-treverdo-700 font-bold text-xl">Datos de la Instalación:</h2>
                <div class="md:grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block mt-4 text-gray-600" for="nroReferenciaCatastral">N° Referencia Catastral</label>
                        <input class="w-full" type="text" id="nroReferenciaCatastral" name="nroReferenciaCatastral">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="poblacion">Poblacion</label>
                        <input class="w-full" type="text" id="poblacion" name="poblacion">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="superficieInstalacion">Superficie Instalación total</label>
                        <input class="w-full" type="number" id="superficieInstalacion" placeholder="0" name="superficieInstalacion" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="superficieRiego">Superficie de Riego</label>
                        <input class="w-full" type="number" id="superficieRiego" placeholder="0" name="superficieRiego" autocomplete="off" min="0">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block mt-4 text-gray-600" for="direccionInstalacion">Dirección Instalación -ofrecer tildar "misma dirección cliente" </label>
                    <input class="w-full" type="text" id="direccionInstalacion" name="direccionInstalacion">
                </div>

                {{-- DATOS DEL TERRENO --}}
                <h2 class="px-2 mt-16 text-treverdo-600 border-b-4 border-treverdo-700 font-bold text-xl">Datos del Terreno:</h2>
                <h3 class="mt-8 px-8 border-b-2 border-white text-gray-500 bg-gray-200 opacity-70 text-lg font-bold rounded-xl ">Suelo</h3>
                <div class="md:grid md:grid-cols-3 gap-8">
                    <div>
                        <label class="block mt-4 text-gray-600" for="texturaSuelo">Textura del suelo:</label>
                        <select class="w-full" name="texturaSuelo" id="texturaSuelo">
                            <option value="arcilloArenoso">Arcillo Arenoso</option>
                            <option value="arcilloLimoso">Arcillo Limoso</option>
                            <option value="arcilloso">Arcilloso</option>
                            <option value="arenoso">Arenoso</option>
                            <option value="arenosoFranco">Arenoso Franco</option>
                            <option value="franco">Franco</option>
                            <option value="francoArcilloArenoso">Franco Arcillo Arenoso</option>
                            <option value="francoArcilloLimoso">Franco Arcillo Limoso</option>
                            <option value="francoLimoso">Franco Limoso</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="profundidadUtil">Profundidad Útil</label>
                        <input class="w-full" type="number" id="profundidadUtil" placeholder="0" name="profundidadUtil" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="porcentajePedregocidad">Porcentaje de pedregocidad</label>
                        <input class="w-full" type="number" id="porcentajePedregocidad" placeholder="0" name="porcentajePedregocidad" autocomplete="off" min="0" max="100">
                    </div>
                </div>
               
                {{-- DATOS DEL CULTIVO --}}
                <h2 class="px-2 mt-16 text-treverdo-600 border-b-4 border-treverdo-700 font-bold text-xl">Datos de Cultivos</h2>
                <h3 class="mt-8 px-8 border-b-2 border-white text-gray-500 bg-gray-200 opacity-70 text-lg font-bold rounded-xl ">Cultivo -se pueden agregar más de 1</h3>
                <div class="md:grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block mt-4 text-gray-600" for="TipoCultivo">Tipo de Cultivo -select anidados -ver excel</label>
                        <select class="w-full" name="TipoCultivo" id="TipoCultivo">
                            <option value="herbaceos">Herbáceos</option>
                            <option value="horticolas">Hortícolas</option>
                            <option value="lenosos">Leñosos</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="superficieCultivo">Superficie -ofrecer tildar "misma superficie Instalación"</label>
                        <input class="w-full" type="number" id="superficieCultivo" placeholder="0" name="superficieCultivo" autocomplete="off" min="0">
                    </div>
                </div>

                <h3 class="mt-8 px-8 border-b-2 border-white text-gray-500 bg-gray-200 opacity-70 text-lg font-bold rounded-xl ">Necesidades Hrídicas del Sistema</h3>
                <div class="md:grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block mt-4 text-gray-600" for="distanciaGoteos">Distancia entre goteos</label>
                        <input class="w-full" type="number" id="distanciaGoteos" placeholder="0" name="distanciaGoteos" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="nroRamales">N° de ramales por línea</label>
                        <input class="w-full" type="number" id="nroRamales" placeholder="1" name="nroRamales" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="caudalGoteo">Caudal Goteo</label>
                        <input class="w-full" type="number" id="caudalGoteo" placeholder="0" name="caudalGoteo" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="separacionLineas">Separación enntre líneas</label>
                        <input class="w-full" type="number" id="separacionLineas" placeholder="0" name="separacionLineas" autocomplete="off" min="0">
                    </div>
                </div>
                
                {{-- DATOS DEL RIEGO --}}
                <h2 class="px-2 mt-16 text-treverdo-600 border-b-4 border-treverdo-700 font-bold text-xl">Datos de Riego:</h2>
                <h3 class="mt-8 px-8 border-b-2 border-white text-gray-500 bg-gray-200 opacity-70 text-lg font-bold rounded-xl ">Tipo de Riego</h3>
                <div class="md:grid md:grid-cols-2">
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoDirecto">Riego Directo</label>
                        <input type="radio" id="riegoDirecto" name="tipoRiego" value="HTML">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoPorAcumulacion">Riego por Acumulación</label>
                        <input type="radio" id="riegoPorAcumulacion" name="tipoRiego" value="CSS">
                    </div>
                </div>
        
                <h3 class="mt-8 px-8 border-b-2 border-white text-gray-500 bg-gray-200 opacity-70 text-lg font-bold rounded-xl ">Cantidad de Horas de Riego Diarias</h3>
                <div class="md:grid md:grid-cols-6 gap-2">
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoEne">ENE</label>
                        <input class="w-full" type="number" id="riegoEne" placeholder="0" name="riegoEne" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoFeb">FEB</label>
                        <input class="w-full" type="number" id="riegoFeb" placeholder="0" name="riegoFeb" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoMaz">MAR</label>
                        <input class="w-full" type="number" id="riegoMaz" placeholder="0" name="riegoMaz" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoAbr">ABR</label>
                        <input class="w-full" type="number" id="riegoAbr" placeholder="0" name="riegoAbr" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoMay">MAY</label>
                        <input class="w-full" type="number" id="riegoMay" placeholder="0" name="riegoMay" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoJun">JUN</label>
                        <input class="w-full" type="number" id="riegoJun" placeholder="0" name="riegoJun" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoJul">JUL</label>
                        <input class="w-full" type="number" id="riegoJul" placeholder="0" name="riegoJul" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoAgo">AGO</label>
                        <input class="w-full" type="number" id="riegoAgo" placeholder="0" name="riegoAgo" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoSep">SEP</label>
                        <input class="w-full" type="number" id="riegoSep" placeholder="0" name="riegoSep" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoOct">OCT</label>
                        <input class="w-full" type="number" id="riegoOct" placeholder="0" name="riegoOct" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoNov">NOV</label>
                        <input class="w-full" type="number" id="riegoNov" placeholder="0" name="riegoNov" autocomplete="off" min="0">
                    </div>
                    <div>
                        <label class="block mt-4 text-gray-600" for="riegoDic">DIC</label>
                        <input class="w-full" type="number" id="riegoDic" placeholder="0" name="riegoDic" autocomplete="off" min="0">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
