@extends('layouts.app')
@section('element')
<link rel="stylesheet" href="../style.css">
@endsection
@section('content')
<main class="container">
    <section>
        <form action="{{'/update/' . $infoId->id}}" method="post">
            @csrf
            @method('PUT')
        <div class="titlebar">
            <h1>Editar concepto</h1>
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
                <textarea name="descripcion" cols="30" rows="10" placeholder="{{$infoId->nombre}}" required></textarea>
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
            <button type="submit">Guardar y modificar cambios</button>
        </div>

        <input type="hidden" name="hidden_id" value="{{$infoId->id}}">
    </form>
    </section>
</main>
    
@endsection