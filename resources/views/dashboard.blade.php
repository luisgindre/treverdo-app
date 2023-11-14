<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-16 flex gap-10">
                    <div class="px-4 border bg-gray-100 opacity-4 w-96 h-44 rounded-md shadow-md">
                        <div class="flex justify-center items-center h-2/3 border-b border-gray-500">
                            <div class="text-4xl"><i class="fa-solid fa-users"></i></div>
                        </div>
                        <div class="text-4xl h-1/3 text-center">4</div>
                    </div>
                    <div class="px-4 border bg-gray-100 opacity-4 w-96 h-44 rounded-md shadow-md">
                        <div class="flex justify-center items-center h-2/3 border-b border-gray-500">
                            <div class="text-4xl"><i class="fa-solid fa-users"></i></div>
                        </div>
                        <div class="text-4xl h-1/3 text-center">4</div>
                    </div>
                    <div class="px-4 border bg-gray-100 opacity-4 w-96 h-44 rounded-md shadow-md">
                        <div class="flex justify-center items-center h-2/3 border-b border-gray-500">
                            <div class="text-4xl"><i class="fa-solid fa-users"></i></div>
                        </div>
                        <div class="text-4xl h-1/3 text-center">4</div>
                    </div>
                   
                </div>
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
