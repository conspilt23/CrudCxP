@extends('layouts.app')
@section('content')
<main class="container">

     <section>
        <div class="content-table" style="width:80%; overflow: auto; text-align: display: flex; justify-content: center;">
<form action="{{route('store')}}" method="POST">
@csrf
        <div class="titlebar">
            <h1>Añadir</h1>
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
                <label>Description (optional)</label>
                <textarea cols="10" rows="5" name="description" maxlength="50"></textarea>
                <label>Nombre del proveedor</label>
                <input type="Text" name="provider" maxlength="20" required>
                <label>Monto (Entrada de documento)</label>
                <input type="number" name="amount">
                <label>Fecha de registro</label>
                <input type="date" name="date_register" id="" name="register_date" required>
                <label>Fecha documento</label>
                <input type="date" name="date_document" id="" name="date_document" required>
            </div>
           <div>
                <label>Tipo de persona</label>
                <select  name="person_type" id="" required>
                    <option disabled selected>Seleccionar el tipo de persona</option>
                    <option value="Jurídica">Jurídica</option>
                    <option value="Física">Física</option>
                </select>
                <hr>
                <label>Cédula</label>
                <input type="number" class="input" name="identifier" maxlength="11" pattern="\d{11}" title="Debe contener exactamente 11 dígitos"  required>
                <hr>
                <label>Balance</label>
                <input type="Number" class="input"name="balance" max="250000" required >
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