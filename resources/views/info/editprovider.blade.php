@extends('layouts.app')
@section('element')
<link rel="stylesheet" href="../style.css">
@endsection
@section('content')
<main class="container">
    <section>
        <form action="{{'/updateProvider/' . $infoId->id}}" method="post">
            @csrf
            @method('PUT')
        <div class="titlebar">
            <h1>Editar Proveedores</h1>
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
                <label>Nombre</label>
                <input type="text" name="provider" value="{{$infoId->nombre}}" >
                <label>tipo de persona</label>
                <select name="person_type">
                    <option value="Jurídica">Jurídica</option>
                    <option value="Física">Física</option>
                </select>
                <label>Cédula o RNC</label>
                <input type="number" name="identifier" value="{{$infoId->cedula_rnc}}">

                <label>Balance</label>
                <input type="number" name="balance" value="{{$infoId->balance}}">
                
            </div>
           <div>
                <hr>
                <label for="">Actualizar estado</label>
                <select  name="status" id=""  required>
                    <option disabled selected>Selecciona el estado</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
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