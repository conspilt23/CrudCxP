<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Concepto;
use App\Models\DocumentoPagar;

class CrudController extends Controller
{


    /**
     * Parte para conceptos
     */

     public function deleteConcept($id){
        $document = Concepto::findOrFail($id);
        $document->delete();

        return redirect()->route('home')->with('success', 'Se ha eliminado el item correctamente');
    }

     public function store(Request $request){

        $request->validate([
            'descripcion' => 'string',
        ]);
        

        $newCrudDocumentPay = New Concepto();
        $newCrudDocumentPay->descripcion = $request->input('descripcion');
        $newCrudDocumentPay->estado = $request->input('status');

        $newCrudDocumentPay->save();

        return redirect()->route('home')->with('success', 'Se ha añadido el Ítem correctamente');
    }



    public function editar($id){
        $infoId = Concepto::findOrFail($id);
        return view('info.edit', compact('infoId'));
    }







    public function index(){
        $datas = Concepto::orderBy('created_at')->get();
        return view('info.contents', ['datas' => $datas]);
    }


    public function update(Request $request, Concepto $infoId){
        $request->validate([
            'description' => 'nullable|string|max:50',
        ]);


        $infoId = Concepto::find($request->input('hidden_id'));
        $infoId->descripcion = $request->input('descripcion');
        $infoId->estado = $request->input('status');

        $infoId->save();

        return redirect()->route('home')->with('success', 'Se ha modificado el item correctamente');


    }




    /*Parte para documentos por pagar
    *
    *
    *
    */

    public function viewAddDocument(){
        $concepts = Concepto::all();
        $providers = Proveedor::all();

        return view('info.addDocument', compact('concepts', 'providers'));
    }

    

    public function storeDocument(Request $request){

        $request->validate([
            'provider' => 'integer',
            'amount' => 'required|numeric|max:250000',
            'description' => 'integer',
            'document_number' => 'required|numeric|digits:5',
            'bill_number' => 'required|numeric',
            'date_document' => 'required|date',
            'date_register' => 'required|date',
        ]);
        

        $newCrudDocumentPay = New DocumentoPagar();
        $newCrudDocumentPay->numero_documento = $request->input('document_number');
        $newCrudDocumentPay->numero_factura = $request->input('bill_number');
        $newCrudDocumentPay->fecha_documento = $request->input('date_document');
        $newCrudDocumentPay->fecha_registro = $request->input('date_register');
        $newCrudDocumentPay->monto = $request->input('amount');
        $newCrudDocumentPay->proveedor_id = $request->input('provider');
        $newCrudDocumentPay->concepto_id = $request->input('description');

        $newCrudDocumentPay->save();

        return redirect()->route('view.document')->with('success', 'Se ha añadido el Ítem correctamente');
    }


    public function documentView(){
        $datas = DocumentoPagar::orderBy('created_at')->get();
        $concepts = Concepto::orderBy('created_at')->get();
        $providers = Proveedor::orderBy('created_at')->get();

        return view('info.document', compact('datas', 'concepts', 'providers'));
    }

    public function editarDocument($id){
        $infoId = DocumentoPagar::findOrFail($id);
        $concepts = Concepto::orderBy('created_at')->get();
        $providers = Proveedor::orderBy('created_at')->get();
        return view('info.editDocument', compact('infoId', 'concepts', 'providers'));
    }

    public function updateDocument(Request $request, DocumentoPagar $infoId){
        $request->validate([
            'description' => 'required|integer',
            'provider' => 'required|integer',
            'amount' => 'required|numeric|max:250000',
            'document_number' => 'required|numeric|digits:5',
            'bill_number' => 'required|numeric',
            'date_document' => 'required|date',
            'date_register' => 'required|date',
        ]);


        $infoId = DocumentoPagar::find($request->input('hidden_id'));
        $infoId->proveedor_id = $request->input('provider');
        $infoId->concepto_id = $request->input('description');

        $infoId->numero_documento =  $request->input('document_number');
        $infoId->numero_factura =  $request->input('bill_number');
        $infoId->fecha_documento =  $request->input('date_document');
        $infoId->monto =  $request->input('amount');
        $infoId->fecha_registro =  $request->input('date_register');
        $infoId->estado =  $request->input('status');

        $infoId->save();

        return redirect()->route('view.document')->with('success', 'Se ha modificado el item correctamente');


    }



    public function deleteDocument($id){
        $document = DocumentoPagar::findOrFail($id);
        $document->delete();

        return redirect()->route('view.document')->with('success', 'Se ha eliminado el item correctamente');
    }

        /*Parte para conceptos o inicio
    *
    *
    *
    */







        /*Parte para proveedores
    *
    *
    *
    */

    public function updateProvider(Request $request, Proveedor $infoId){
        $request->validate([
            'provider' => 'required|string',
            'person_type' => 'required|string',
            'identifier' => 'required|numeric|digits:11',
            'balance' => 'required|numeric|max:250000',
        ]);


        $infoId = Proveedor::find($request->input('hidden_id'));
        $infoId->nombre = $request->input('provider');
        $infoId->cedula_rnc = $request->input('identifier');
        $infoId->tipo_persona = $request->input('person_type');
        $infoId->balance = $request->input('balance');
        $infoId->estado =  $request->input('status');

        
        $infoId->save();

        return redirect()->route('view.provider')->with('success', 'Se ha modificado el item correctamente');


    }

    public function editProvider($id){
        $infoId = Proveedor::findOrFail($id);
        return view('info.editprovider', compact('infoId'));
    }

    public function providerView(){
        $datas = Proveedor::orderBy('created_at')->get();
        return view('info.provider', ['datas' => $datas]);
    }

    public function deleteProvider($id){
        $document = Proveedor::findOrFail($id);
        $document->delete();

        return redirect()->route('view.provider')->with('success', 'Se ha eliminado el item correctamente');
    }




    public function storeProvider(Request $request){

        $request->validate([
            'provider' => 'string',
            'balance' => 'required|numeric|max:250000',
            'identifier' => 'required|numeric|digits:11',
            'person_type' => 'required',
        ]);
        

        $newCrudDocumentPay = New Proveedor();
        $newCrudDocumentPay->nombre = $request->input('provider');
        $newCrudDocumentPay->tipo_persona = $request->input('person_type');
        $newCrudDocumentPay->cedula_rnc = $request->input('identifier');
        $newCrudDocumentPay->balance = $request->input('balance');
        $newCrudDocumentPay->tipo_persona = $request->input('person_type');

        $newCrudDocumentPay->save();

        return redirect()->route('view.provider')->with('success', 'Se ha añadido el Ítem correctamente');
    }

}
