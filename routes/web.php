<?php

use App\Http\Controllers\ClienteController;
use App\Mail\prueba;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
    

    // URL de la API de Dolibarr
    $dolibarrApiUrl = 'http://trevdevsp/api/index.php/thirdparties';

    // Credenciales de autenticación (ejemplo usando token de acceso)
    $accessToken = '94c30caeb8ad7e32c3c70f6fdb498e69ae088453';

    // Realizar la solicitud GET a la API de Dolibarr
    $response = Http::withHeaders([
        'DOLAPIKEY' =>  $accessToken,
    ])->get($dolibarrApiUrl);

    // Verificar si la solicitud fue exitosa (código 200)
    if ($response->successful()) {
        // Obtener los datos de la respuesta en formato JSON
        $data = $response->json();
        $terceros = [];
        // Procesar los datos según sea necesario
        // Por ejemplo, imprimir la lista de empresas
       foreach($data as $tercero)
       {
           if($tercero['user_creation'] == 100)
           {
               $terceros[] = $tercero;
               
           }
           /* dump($tercero['user_creation']); */
       }

       
    } else {
        // Manejar el error de la solicitud
        echo 'Error en la solicitud: ' . $response->status();
    }

        return view('dashboard',compact('terceros'));
    })->name('dashboard');
    
});




