<?php

namespace App\Http\Controllers;

use App\Models\AsientoContable;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AsientosContablesController extends Controller
{
    public function delete($id){
        $document = AsientoContable::findOrFail($id);
        $document->delete();

        return redirect()->route('view.asiento')->with('success', 'Se ha eliminado el asiento contable correctamente');
    }


    
    public function store(Request $request){

        $request->validate([
            'descripcion' => 'required|string',
            'tipo_inventario' => 'required|string',
            'tipo_movimiento' => 'required|numeric|min:1|max:2',
            'tipo_movimiento_2' => 'required|numeric|min:1|max:2',
            'cuenta_1' => 'required|numeric|min:1|max:21',
            'cuenta_2' => 'required|numeric|min:1|max:21',
            'moneda' => 'required|numeric|min:1|max:51',
            'fecha_asiento' => 'required|date',
            'monto_asiento' => 'required|numeric',
            'monto_asiento_2' => 'required|numeric',
            'estado' => 'required|numeric|min:1|max:8',
            'asiento_id' =>'integer|nullable'
        ]);
        

        $newCrudAsiento = New AsientoContable();
        $newCrudAsiento->descripcion = $request->input('descripcion');
        $newCrudAsiento->tipo_inventario = $request->input('tipo_inventario');
        $newCrudAsiento->tipo_movimiento = $request->input('tipo_movimiento');
        $newCrudAsiento->tipo_movimiento_2 = $request->input('tipo_movimiento_2');
        $newCrudAsiento->cuenta_1 = $request->input('cuenta_1');
        $newCrudAsiento->cuenta_2 = $request->input('cuenta_2');
        $newCrudAsiento->moneda = $request->input('moneda');
        $newCrudAsiento->fecha_asiento = $request->input('fecha_asiento');
        $newCrudAsiento->monto_asiento = $request->input('monto_asiento');
        $newCrudAsiento->monto_asiento_2 = $request->input('monto_asiento_2');
        $newCrudAsiento->estado = $request->input('estado');
        $newCrudAsiento->asiento_id = $request->input('asiento_id');

        $newCrudAsiento->save();

        return redirect()->route('view.asiento')->with('success', 'Se ha añadido el asiento correctamente');
    }





    

    public function editar($id){
        $infoId = AsientoContable::findOrFail($id);
        return view('info.editAsiento', compact('infoId'));
    }







    public function index(){
        $datas = AsientoContable::orderBy('created_at')->get();
        return view('info.asientos', ['datas' => $datas]);
    }


    public function update(Request $request, AsientoContable $infoId){
        $request->validate([
            'descripcion' => 'required|string',
            'tipo_inventario' => 'required|string',
            'tipo_movimiento' => 'required|numeric|min:1|max:2',
            'tipo_movimiento_2' => 'required|numeric|min:1|max:2',
            'cuenta_1' => 'required|numeric|min:1|max:21',
            'cuenta_2' => 'required|numeric|min:1|max:21',
            'moneda' => 'required|numeric|min:1|max:51',
            'fecha_asiento' => 'required|date',
            'monto_asiento' => 'required|numeric',
            'monto_asiento_2' => 'required|numeric',
            'estado' => 'required|numeric|min:1|max:8',
            'asiento_id' =>'integer|nullable'
        ]);
        


        $infoId = AsientoContable::find($request->input('hidden_id'));
        $infoId->descripcion = $request->input('descripcion');
        $infoId->tipo_inventario = $request->input('tipo_inventario');
        $infoId->tipo_movimiento = $request->input('tipo_movimiento');
        $infoId->tipo_movimiento_2 = $request->input('tipo_movimiento_2');
        $infoId->cuenta_1 = $request->input('cuenta_1');
        $infoId->cuenta_2 = $request->input('cuenta_2');
        $infoId->moneda = $request->input('moneda');
        $infoId->fecha_asiento = $request->input('fecha_asiento');
        $infoId->monto_asiento = $request->input('monto_asiento');
        $infoId->monto_asiento_2 = $request->input('monto_asiento_2');
        $infoId->estado = $request->input('estado');
        $infoId->asiento_id = $request->input('asiento_id');
        $infoId->save();


        return redirect()->route('view.asiento')->with('success', 'Se ha modificado el asiento correctamente');


    }








    /**
     * Para contabilizar asientos en la integración de app externa.
     */


     public function contabilizar()
     {
         // Obtener los registros de la base de datos que cumplan con la condición
         $asientos = AsientoContable::whereNull('asiento_id')->first();
     
         // Verificar si hay registros para contabilizar
         if (!$asientos) {
             return response()->json(['message' => 'No hay asientos contables para contabilizar'], 404);
         }
     
         // Construir el JSON individual para cada modelo
         $jsonAsiento = [
             'descripcion' => $asientos->descripcion,
             'auxiliar' => 9, // Ajusta este valor según tus necesidades
             'fecha' => $asientos->fecha_asiento,
             'monto' => intval(($asientos->monto_asiento + $asientos->monto_asiento_2)),
             'estado' => intval($asientos->estado),
             'moneda' => intval($asientos->moneda), // Ajusta este valor según tus necesidades
             'transacciones' => [
                 ['cuenta' => intval($asientos->cuenta_1),
                  'tipoMovimiento' => intval($asientos->tipo_movimiento),
                  'monto' => intval($asientos->monto_asiento)
                 ],
                 ['cuenta' => intval($asientos->cuenta_2),
                  'tipoMovimiento' => intval($asientos->tipo_movimiento_2),
                  'monto' => intval($asientos->monto_asiento_2)
                 ]
             ]
         ];
     
         // Enviar el JSON a otro servidor
         $client = new Client();
         $response = $client->post('https://ap1-contabilidad.azurewebsites.net/Contabilidad/AsientoContable', [
             'headers' => [
                 'Content-Type' => 'application/json',
             ],
             'body' => json_encode($jsonAsiento),
         ]);
     
         // Manejar la respuesta
         if ($response->getStatusCode() === 201 || $response->getStatusCode() === 200 ) {
             // Obtener el idAsiento del JSON de respuesta
             $responseJson = $response->getBody()->getContents();
             $idAsiento = json_decode($responseJson, true)['idAsiento'];
     
             // Actualizar el modelo AsientoContable
             $asiento = AsientoContable::whereNull('asiento_id')->first();
             $asiento->asiento_id = $idAsiento;
             $asiento->save();
     
             return redirect()->route('view.asiento')->with('success', 'Se ha enviado los asientos contables correctamente y se ha actualizado el ID nulo');
         } else {
             // Obtener el mensaje de error del servidor
             $errorMessage = $response->getBody()->getContents();
             $statusCode = $response->getStatusCode();
     
             return response()->json(['error' => 'Error al enviar asientos contables al otro servidor por error: ' . $statusCode . '. ' . $errorMessage], $statusCode);
         }
     }
     
 }