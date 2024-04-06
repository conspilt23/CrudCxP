@extends('layouts.app')
@section('element')
<link rel="stylesheet" href="../style.css">
@endsection
@section('content')
<main class="container">
    <section>
        <form action="{{'/updateDocument/' . $infoId->id}}" method="post">
            @csrf
            @method('PUT')
        <div class="titlebar">
            <h1>Editar Documentos</h1>
        </div>
        @if($errors->any)
        <script type="text/javascript">
        Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "Algo salio mal",
  footer: '<p>Revisa los errores y corrige</p>'
});
        </script>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
           <div>
                <label>Número de documento</label>
                <input type="number" name="document_number" value="{{$infoId->numero_documento}}" >
                <label>Número de factura a pagar</label>
                <input type="number" name="bill_number" value="{{$infoId->numero_factura}}">
                <label>Selecciona al proveedor</label>
                <select name="provider">
                    @forelse ($providers as $provider)
                    <option value="{{$provider->id}}">{{$provider->nombre}}</option>
                    @empty
                        <option disabled>No hay proveedores, por favor añade algunos</option>
                    @endforelse
                </select>

                <label>Selecciona el concepto</label>
                <select name="description">
                    @forelse ($concepts as $concept)
                    <option value="{{$concept->id}}">{{$concept->descripcion}}</option>
                    @empty
                        <option disabled>No hay proveedores, por favor añade algunos</option>
                    @endforelse
                </select>
                
                <label>Monto (Entrada de documento)</label>
                <input type="number" name="amount"  value="{{$infoId->monto}}" >
                <label>Fecha de registro</label>
                <input type="date" name="date_register" id=""  value="{{$infoId->fecha_registro}}" >
                <label>Fecha documento</label>
                <input type="date" name="date_document" id="" value="{{$infoId->fecha_documento}}">
            </div>
           <div>
                <hr>
                <label for="">Actualizar estado</label>
                <select  name="status" id=""  required>
                    <option disabled selected>Selecciona el estado</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Pagado">Pagado</option>
                    <option selected value="{{$infoId->estado}}">{{$infoId->estado}}</option>
                </select>
                <hr>
           </div>
        </div>
        <div class="titlebar">
            <h1></h1>
            <button type="submit">Guardar y modificar cambios</button>
        </div>

        <input type="hidden" name="hidden_id" value="{{$infoId->id}}">
    </form>
    </section>
</main>
    
@endsection