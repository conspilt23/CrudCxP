@extends('layouts.app')
@section('content')
<main class="container">

     <section>
        <div class="content-table" style="width:80%; overflow: auto; text-align: display: flex; justify-content: center;">
<form action="{{route('store')}}" method="POST">
@csrf
        <div class="titlebar">
            <h1>Añadir Concepto</h1>
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
                <label>Descripción</label>
                <textarea name="descripcion" cols="30" rows="10" required></textarea>
            </div>
           <div>
                <label>Estado</label>
                <select  name="status" id="" required>
                    <option disabled selected>Seleccionar el estado</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
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