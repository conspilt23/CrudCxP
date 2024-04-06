@extends('layouts.app')
@section('content')
<main class="container">

     <section>
        <div class="content-table" style="width:80%; overflow: auto; text-align: display: flex; justify-content: center;">
<form action="{{route('store.provider')}}" method="POST">
@csrf
        <div class="titlebar">
            <h1>Añadir nuevo proveedor</h1>
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
                <label>Nombre del proveedor</label>
                <input type="Text" name="provider" maxlength="20" required>
                <label>Cédula o RNC</label>
                <input type="number" name="identifier">
                <label>Balance</label>
                <input type="number" name="balance">
                <label>tipo de persona</label>
                <select name="person_type">
                    <option value="Jurírica">Jurídica</option>
                    <option value="Física">Física</option>
                </select>
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