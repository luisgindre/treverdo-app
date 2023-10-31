<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/guarda', function () {
    
    $hoy = getdate();
    $hoy =date('YmdHis',$hoy[0]);
   $path = Storage::path('guarda.csv');
  
   $file=fopen($path,'r');
   $fileGuardar=fopen('enviadosGuarda'.$hoy.'.txt','w');
   /* dd($hoy,'enviadosGuarda'.$hoy.'.txt'); */
  /*  $cont = fgetcsv($file,null,","); */
  // Define the URL of the SOAP service
  $url = "http://mule-ee-test.uba.ar/EEServices/generar-pase?wsdl";
  $urlBloquear = "http://mule-ee-test.uba.ar/EEServices/bloqueo-expediente?wsdl";

 


   while (($datos = fgetcsv($file, NULL, ",")) !== FALSE)
   {
    /* dd($datos[4]); */
        // Bloqueo el expediente si esta liberado
        if($datos[3] == 0)
        {
            $client = new SoapClient($urlBloquear);

            $requestData = new stdClass();
            
            $requestData->sistemaBloqueador =  "".$datos[2]."";
            $requestData->codigoEE = "".$datos[1]."";
            
            $response = $client->__soapCall("bloquearExpediente", array($requestData));
        }

        // Envío a Guarda Temporal con GEDO existente
        $client = new SoapClient($url);
    
        $requestData = new stdClass();
        $requestData->datosPase = new stdClass();
            $requestData->datosPase->codigoEE = "".$datos[1]."";
            $requestData->datosPase->esMesaDestino = "";
            $requestData->datosPase->esReparticionDestino = "";
            $requestData->datosPase->esSectorDestino = "";
            $requestData->datosPase->esUsuarioDestino = "";
            $requestData->datosPase->estadoSeleccionado = "Guarda Temporal";
            $requestData->datosPase->motivoPase = "Envío por Resolución 1234556";
            $requestData->datosPase->reparticionDestino = "";
            $requestData->datosPase->sectorDestino = "";
            $requestData->datosPase->sistemaOrigen = "".$datos[2]."";
            $requestData->datosPase->usuarioDestino = "";
            $requestData->datosPase->usuarioOrigen = "".$datos[0]."";
        $requestData->numeroSadePase = "IF-2023-00003966-UBA-SSTDM#REC";
        /* dd($requestData); */
    
        $response = $client->__soapCall("generarPaseEESinDocumento", array($requestData));
        $result = $response->return;
        
        fwrite($fileGuardar, $result);
        fwrite ($fileGuardar, "\n");
   }

   fclose($file);
   fclose($fileGuardar);



    /* try {
        // Define the URL of the SOAP service
        $url = "http://mule-ee-test.uba.ar/EEServices/generar-pase?wsdl";
    
        // Create a new SOAP client
        $client = new SoapClient($url);
    
        // Create a new instance of stdClass to represent the request
        $requestData = new stdClass();
        
        // Create a "datosPase" object within the request
        $requestData->datosPase = new stdClass();
        $requestData->datosPase->codigoEE = "EX-2019-00054779- -UBA-UBA";
        $requestData->datosPase->esMesaDestino = "";
        $requestData->datosPase->esReparticionDestino = "";
        $requestData->datosPase->esSectorDestino = "";
        $requestData->datosPase->esUsuarioDestino = "";
        $requestData->datosPase->estadoSeleccionado = "Guarda Temporal";
        $requestData->datosPase->motivoPase = "Envío por Resolución 1234556";
        $requestData->datosPase->reparticionDestino = "";
        $requestData->datosPase->sectorDestino = "";
        $requestData->datosPase->sistemaOrigen = "TAD";
        $requestData->datosPase->usuarioDestino = "";
        $requestData->datosPase->usuarioOrigen = "USUARIOTADUBA";
    
        // Set other request parameters
        $requestData->numeroSadePase = "IF-2023-00003966-UBA-SSTDM#REC";
    
        // Call the SOAP method
        $response = $client->__soapCall("generarPaseEESinDocumento", array($requestData));
    
        // Process the response
        $result = $response->return;
        echo "Response: " . $result . "\n";
    
    } catch (SoapFault $e) {
        // Handle any SOAP errors here
        echo "Error: " . $e->getMessage() . "\n";
    } */

    return view('enviarGuardaTemp');
});