@extends('layouts.app')
@section('content')
<main class="container">

     <section>
        <div class="content-table" style="width:80%; overflow: auto; text-align: display: flex; justify-content: center;">
<form action="{{route('store.asiento')}}" method="POST">
@csrf
        <div class="titlebar">
            <h1>Añadir asiento contable</h1>
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
                <select  name="estado" id="" required>
                    <option disabled selected>Seleccionar el estado</option>
                    <option value="1">Registrado</option>
                    <option value="2">Pendiente</option>
                    <option value="3">Autorizado</option>
                    <option value="4">Mayorizado</option>
                    <option value="5">Anulado</option>
                    <option value="6">Revertido</option>
                    <option value="7">Ajustado</option>
                    <option value="8">Cerrado</option>
                </select>
                <hr>

                <label>Tipo de movimiento</label>
                <select  name="tipo_movimiento" id="" required>
                    <option disabled selected>Seleccionar el estado</option>
                    <option value="1">Débito (DB)</option>
                    <option value="2">Crédito (CR)</option>
                </select>
                <hr>

                <label>2do Tipo de movimiento</label>
                <select  name="tipo_movimiento_2" id="" required>
                    <option disabled selected>Seleccionar el estado</option>
                    <option value="1">Débito (DB)</option>
                    <option value="2">Crédito (CR)</option>
                </select>
                <hr>

                
                <label>1ra cuenta</label>
                <select name="cuenta_1">
                    <option value="1">Activos</option>
                    <option value="2">Efectivo en Caja y Banco</option>
                    <option value="3">Caja Chica</option>
                    <option value="4">Cuenta Corriente Banco X</option>
                    <option value="5">Inventario y Mercancías</option>
                    <option value="6">Inventario</option>
                    <option value="7">Cuentas por Cobrar</option>
                    <option value="8">Cuentas por Cobrar Cliente X</option>
                    <option value="9">Ventas</option>
                    <option value="10">Ingresos por Ventas</option>
                    <option value="11">Gastos</option>
                    <option value="12">Gastos Administrativos</option>
                    <option value="13">Gastos Generales</option>
                    <option value="14">Gasto Depreciación de Activos Fijos</option>
                    <option value="15">Depreciación Acumulada de Activos Fijos</option>
                    <option value="16">Salarios y Sueldos Empleados</option>
                    <option value="17">Gastos de Nomina Empresa</option>
                    <option value="18">Compra de Mercancías</option>
                    <option value="19">Cuentas por Pagar</option>
                    <option value="20">Cuentas por Pagar Proveedor X</option>
                    <option value="21">Cuentas Cheques en Banco X</option>
                </select>
                
                <hr>



                                
                <label>2da cuenta</label>
                <select name="cuenta_2">
                    <option value="1">Activos</option>
                    <option value="2">Efectivo en Caja y Banco</option>
                    <option value="3">Caja Chica</option>
                    <option value="4">Cuenta Corriente Banco X</option>
                    <option value="5">Inventario y Mercancías</option>
                    <option value="6">Inventario</option>
                    <option value="7">Cuentas por Cobrar</option>
                    <option value="8">Cuentas por Cobrar Cliente X</option>
                    <option value="9">Ventas</option>
                    <option value="10">Ingresos por Ventas</option>
                    <option value="11">Gastos</option>
                    <option value="12">Gastos Administrativos</option>
                    <option value="13">Gastos Generales</option>
                    <option value="14">Gasto Depreciación de Activos Fijos</option>
                    <option value="15">Depreciación Acumulada de Activos Fijos</option>
                    <option value="16">Salarios y Sueldos Empleados</option>
                    <option value="17">Gastos de Nomina Empresa</option>
                    <option value="18">Compra de Mercancías</option>
                    <option value="19">Cuentas por Pagar</option>
                    <option value="20">Cuentas por Pagar Proveedor X</option>
                    <option value="21">Cuentas Cheques en Banco X</option>
                </select>
                
                <hr>
                
                <label>Tipo de inventario</label>
                <input type="text" name="tipo_inventario" required>
                <hr>

                <label>Fecha de asiento</label>
                <input type="date" name="fecha_asiento" required>
                <hr>

                <label>Monto</label>
                <input type="number" name="monto_asiento" required>
                <hr>

                <label>2do Monto</label>
                <input type="number" name="monto_asiento_2" required>
                <hr>

                
                <label>Moneda</label>
                <select name="moneda">
                    <option value="1">Peso Dominicano</option>
                    <option value="2">Dólar Estadounidense</option>
                    <option value="3">Euro</option>
                    <option value="4">Francos Suizos</option>
                    <option value="5">Libras Esterlinas</option>
                    <option value="6">Dólar Canadiense</option>
                    <option value="7">Yen Japonés</option>
                    <option value="8">Dólar Australiano</option>
                    <option value="9">Yuan Chino</option>
                    <option value="10">Rupia India</option>
                    <option value="11">Real Brasileño</option>
                    <option value="12">Peso Mexicano</option>
                    <option value="13">Won Surcoreano</option>
                    <option value="14">Rublo Ruso</option>
                    <option value="15">Lira Turca</option>
                    <option value="16">Rand Sudafricano</option>
                    <option value="17">Dólar Neozelandés</option>
                    <option value="18">Dólar de Singapur</option>
                    <option value="19">Dólar de Hong Kong</option>
                    <option value="20">Corona Sueca</option>
                    <option value="21">Corona Noruega</option>
                    <option value="22">Corona Danesa</option>
                    <option value="23">Zloty Polaco</option>
                    <option value="24">Forint Húngaro</option>
                    <option value="25">Corona Checa</option>
                    <option value="26">Nuevo Shekel Israelí</option>
                    <option value="27">Baht Tailandés</option>
                    <option value="28">Rupia Indonesia</option>
                    <option value="29">Peso Filipino</option>
                    <option value="30">Ringgit Malayo</option>
                    <option value="31">Pesos Colombianos</option>
                    <option value="32">Dinero Indio</option>
                    <option value="47">DogeCoin</option>
                    <option value="48">Bitcoin</option>
                    <option value="49">Ethereum</option>
                    <option value="51">Franco CFA</option>
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