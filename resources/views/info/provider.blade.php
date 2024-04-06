@extends('layouts.app')
@section('content')
<main class="container">
    <section>
        <div class="titlebar">
            <h1>Cuentas por pagar (proveedores)</h1>
            <a href="{{route('add.provider')}}">Añadir Nuevo proveeodr</a>
        </div>
        @if ($message = Session::get('success'))
        <script type="text/javascript">
        Swal.fire({
  position: "top-end",
  icon: "success",
  title: `{{$message}}`,
  showConfirmButton: false,
  timer: 1500
});
</script>
        @endif
        <div class="content-table" style="width:100%; overflow: auto;">
        <table class="responsive-table" style="overflow: auto;">
            <thead>
                <tr>
                    <th colspan="15" style="width: 100%;">Tabla de Contenido</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Tipo de persona</th>
                    <th>Cédula / RNC</th>
                    <th>Balance</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($datas as $data)
                    <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->nombre}}</td>
                    <td>{{$data->tipo_persona}}</td>
                    <td>{{$data->cedula_rnc}}</td>
                    <td>{{$data->balance}}</td>
                    <td>{{$data->estado}}</td>
                    <td>   <a href="{{route('editar.provider', $data->id)}}" class="btn btn-success" style="display: block;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg>
                    </a>

                    <form action="{{route('delete.provider', $data->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" style="display: block;" onclick="deleteConfirm(event);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                            </svg>
                        </button>
                    </form></td>
                </tr>
                    @empty
                    <tr>
                    <td colspan="15" style="text-align: center; padding: 20px;">No Hay datos registrados</td>
                    </tr>
                        
                    @endforelse
            
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>
    </section>
    <br>
</main>  
<script>
    window.deleteConfirm = function(e) {
        e.preventDefault();
        var form = e.target.form

        Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
 form.submit();
  }
});
    }

</script>
@endsection

@if ($message = Session::get('success'))
@section('element')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@endif