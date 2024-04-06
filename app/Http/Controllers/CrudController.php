<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Concepto;
use App\Models\DocumentoPagar;

class CrudController extends Controller
{
    
    public function index(){
        $datas = DocumentoPagar::orderBy('created_at')->get();
        return view('info.contents', ['datas' => $datas]);
    }

    public function store(Request $request){

        $request->validate([
            'provider' => 'required|string|max:20',
            'person_type' => 'required|string',
            'identifier' => 'required|numeric|digits:11',
            'balance' => 'required|numeric|max:250000',
            'amount' => 'required|numeric|max:250000',
            'description' => 'nullable|string|max:50',
            'document_number' => 'required|numeric|digits:5',
            'bill_number' => 'required|numeric',
            'date_document' => 'required|date',
            'date_register' => 'required|date',
        ]);
        
        $newCrudProvider = New Proveedor();
        $newCrudConcept = New Concepto();
        $newCrudDocumentPay = New DocumentoPagar();


        $newCrudProvider->nombre =  $request->input('provider');
        $newCrudProvider->tipo_persona = $request->input('person_type'); 
        $newCrudProvider->cedula_rnc =    $request->input('identifier'); 
        $newCrudProvider->balance =  $request->input('balance'); 

        $newCrudProvider->save();

        $newCrudConcept->descripcion = $request->input('description');

        $newCrudConcept->save();


        $newCrudDocumentPay->numero_documento = $request->input('document_number');
        $newCrudDocumentPay->numero_factura = $request->input('bill_number');
        $newCrudDocumentPay->fecha_documento = $request->input('date_document');
        $newCrudDocumentPay->fecha_registro = $request->input('date_register');
        $newCrudDocumentPay->monto = $request->input('amount');
        $newCrudDocumentPay->proveedor_id = Proveedor::where('nombre', $request->input('provider'))->first()->id;
        $newCrudDocumentPay->concepto_id = Concepto::where('descripcion', $request->input('description'))->first()->id;

        $newCrudDocumentPay->save();

        return redirect()->route('home')->with('success', 'Se ha añadido el Ítem correctamente');
    }

    public function editar($id){
        $infoId = DocumentoPagar::findOrFail($id);
        return view('info.edit', ['infoId' => $infoId]);
    }

    public function update(Request $request, DocumentoPagar $infoId){
        $request->validate([
            'provider' => 'required|string|max:20',
            'person_type' => 'required|string',
            'identifier' => 'required|numeric|digits:11',
            'balance' => 'required|numeric|max:250000',
            'amount' => 'required|numeric|max:250000',
            'description' => 'nullable|string|max:50',
            'document_number' => 'required|numeric|digits:5',
            'bill_number' => 'required|numeric',
            'date_document' => 'required|date',
            'date_register' => 'required|date',
        ]);


        $infoId = DocumentoPagar::find($request->input('hidden_id'));
        $infoId->proveedor->nombre = $request->input('provider');
        $infoId->proveedor->cedula_rnc = $request->input('identifier');
        $infoId->proveedor->tipo_persona = $request->input('person_type');
        $infoId->proveedor->balance = $request->input('balance');
        $infoId->concepto->descripcion = $request->input('description');

        $infoId->numero_documento =  $request->input('document_number');
        $infoId->numero_factura =  $request->input('bill_number');
        $infoId->fecha_documento =  $request->input('date_document');
        $infoId->monto =  $request->input('amount');
        $infoId->fecha_registro =  $request->input('date_register');
        $infoId->estado =  $request->input('status');

        
        $infoId->proveedor->save();
        $infoId->concepto->save();
        $infoId->save();

        return redirect()->route('home')->with('success', 'Se ha modificado el item correctamente');


    }

    public function delete($id){
        $document = DocumentoPagar::findOrFail($id);
        $document_provider = $document->proveedor;
        $document_concept = $document->concepto;

        $document_provider->delete();
        $document_concept->delete();
        $document->delete();

        return redirect()->route('home')->with('success', 'Se ha eliminado el item correctamente');
    }
}
