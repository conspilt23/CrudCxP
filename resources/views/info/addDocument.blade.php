@extends('layouts.app')
@section('content')
<main class="container">

     <section>
        <div class="content-table" style="width:80%; overflow: auto; text-align: display: flex; justify-content: center;">
<form action="{{route('store.document')}}" method="POST">
@csrf
        <div class="titlebar">
            <h1>Añadir nuevo documento</h1>
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
                <input type="number" name="document_number" required>
                <label>Número de factura a pagar</label>
                <input type="number" name="bill_number" required>
                <label>Selecciona el concepto</label>
                <select name="description">
                    @forelse ($concepts as $concept)
                    <option value="{{$concept->id}}">{{$concept->descripcion}}</option>
                    @empty
                        <option disabled>No hay conceptos, por favor añade algunos</option>
                    @endforelse
                </select>
                
                <label>Selecciona al proveedor</label>
                <select name="provider">
                    @forelse ($providers as $provider)
                    <option value="{{$provider->id}}">{{$provider->nombre}}</option>
                    @empty
                        <option disabled>No hay proveedores, por favor añade algunos</option>
                    @endforelse
                </select>
                <label>Monto (Entrada de documento)</label>
                <input type="number" name="amount">
                <label>Fecha de registro</label>
                <input type="date" name="date_register" id="" name="register_date" required>
                <label>Fecha documento</label>
                <input type="date" name="date_document" id="" name="date_document" required>
            </div>
           <div>
               
                <hr>
           </div>
        </div>
        <div class="titlebar">
            <h1></h1>
            <button type="submit">Guardar e Insertar</button>
        </div>
    </form>
        </div>
    </section>
</main>
    
@endsection