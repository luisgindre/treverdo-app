<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-16 flex justify-around">
                    
                    <div class="px-4 w-64 h-32 rounded-md shadow-lg">
                        <div class="flex justify-center items-center h-1/3">
                            <div class="flex flex-col">
                                <h3 class="text-treverdo-800 font-black text-2xl">Clientes</h3>
                            </div>
                        </div>
                        <div class="flex justify-center items-center text-3xl h-2/3 text-center">
                            <div class="flex justify-center items-center text-gray-700 border w-14 h-14 rounded-full border-treverdo-200 bg-gray-900">
                                <h2 class="text-treverdo-200">4</h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-4 w-64 h-32 rounded-md shadow-lg">
                        <div class="flex justify-center items-center h-1/3">
                            <div class="flex flex-col">
                                <h3 class="text-treverdo-800 font-black text-2xl">Instalaciones</h3>
                            </div>
                        </div>
                        <div class="flex justify-center items-center text-3xl h-2/3 text-center">
                            <div class="flex justify-center items-center text-gray-700 border w-14 h-14 rounded-full border-treverdo-200 bg-treverdo-200">
                                <h2 class="text-gray-900">6</h2>
                            </div>
                        </div>
                    </div>
                    
                </div>
               
                <div class="flex flex-col gap-2 w-full px-8">
                    
                    @foreach($terceros as $tercero)
                    
                    <div class="flex w-full border rounded-lg border-treverdo-600 py-2 px-2">
                    
                        <div class="">{{ $tercero['name_alias'] }}</div>
                        <div class="">{{ $tercero['code_client'] }}</div>
                        <div class="">{{ isset($tercero['stcomm_picto']) }}</div>
                        <div class="">{{ $tercero['status_prospect_label'] }}</div>
                   
                    </div>
                    
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
