@extends('layouts.app')
@section('element')
<link rel="stylesheet" href="../style.css">
@endsection
@section('content')
<main class="container">
    <section>
        <form action="{{'/updateAsiento/' . $infoId->id}}" method="post">
            @csrf
            @method('PUT')
        <div class="titlebar">
            <h1>Editar Asientos</h1>
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
                <textarea name="descripcion" cols="30" rows="10" required placeholder="{{$infoId->descripcion}}"></textarea>
            </div>
           <div>
                <label>Estado</label>
                <select  name="estado" id="estado" required>
                    <option value="1">Registrado</option>
                    <option value="2">Pendiente</option>
                    <option value="3">Autorizado</option>
                    <option value="4">Mayorizado</option>
                    <option value="5">Anulado</option>
                    <option value="6">Revertido</option>
                    <option value="7">Ajustado</option>
                    <option value="8">Cerrado</option>
                    <option selected value="{{$infoId->estado}}">{{$infoId->estado}}</option>
                </select>
                <hr>

                <label>Tipo de movimiento</label>
                <select  name="tipo_movimiento" id="" required>
                    <option disabled>Seleccionar el estado</option>
                    <option value="1">Débito</option>
                    <option value="2">Crédito</option>
                    <option selected value="{{$infoId->tipo_movimiento}}">{{($infoId->tipo_movimiento === 1) ? 'Débito' : 'Crédito'}}</option>
                </select>
                <hr>
                

                
                <label>2do Tipo de movimiento</label>
                <select  name="tipo_movimiento_2" id="" required>
                    <option disabled>Seleccionar el estado</option>
                    <option value="DB">Débito</option>
                    <option value="CR">Crédito</option>
                    <option selected value="{{$infoId->tipo_movimiento_2}}">{{($infoId->tipo_movimiento_2 === 1) ? 'Débito' : 'Crédito'}}</option>
                </select>
                <hr>


                <label>1ra cuenta</label>
                <select name="cuenta_1" id="cuenta_2>
                    <option selected value="{{$infoId->cuenta_1}}">{{$infoId->cuenta_1}}</option>
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
                <select name="cuenta_2" id="cuenta_2">
                    <option selected value="{{$infoId->cuenta_2}}">{{$infoId->cuenta_2}}</option>
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
                <input type="text" name="tipo_inventario" value="{{$infoId->tipo_inventario}}" required>
                <hr>

                <label>Fecha de asiento</label>
                <input type="date" name="fecha_asiento" value="{{$infoId->fecha_asiento}}" required>
                <hr>

                <label>Monto</label>
                <input type="number" name="monto_asiento" value="{{$infoId->monto_asiento}}" required>
                <hr>

                <label>2do Monto</label>
                <input type="number" name="monto_asiento_2" value="{{$infoId->monto_asiento_2}}" required>
                <hr>


                <label>Moneda</label>
                <select name="moneda" id="moneda">
                    <option selected value="{{$infoId->moneda}}">{{$infoId->moneda}}</option>
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
<script>
    // Obtener el elemento select
    var select = document.getElementById('estado');

    // Función para actualizar el texto de la opción seleccionada
    function actualizarTexto() {
        var option = select.options[select.selectedIndex];
        switch (option.value) {
            case '1':
                option.text = 'Registrado';
                break;
            case '2':
                option.text = 'Pendiente';
                break;
            case '3':
                option.text = 'Autorizado';
                break;
            case '4':
                option.text = 'Mayorizado';
                break;
            case '5':
                option.text = 'Anulado';
                break;
            case '6':
                option.text = 'Revertido';
                break;
            case '7':
                option.text = 'Ajustado';
                break;
            case '8':
                option.text = 'Cerrado';
                break;
            default:
                option.text = '';
                break;
        }
    }

    var select = document.getElementById('moneda');

// Función para actualizar el texto de la opción seleccionada
function actualizarTextoMoneda() {
    var option = select.options[select.selectedIndex];
    switch (option.value) {
        case '1':
            option.text = 'Peso Dominicano';
            break;
        case '2':
            option.text = 'Dólar Estadounidense';
            break;
        case '3':
            option.text = 'Euro';
            break;
        case '4':
            option.text = 'Francos Suizos';
            break;
        case '5':
            option.text = 'Libras Esterlinas';
            break;
        case '6':
            option.text = 'Dólar Canadiense';
            break;
        case '7':
            option.text = 'Yen Japonés';
            break;
        case '8':
            option.text = 'Dólar Australiano';
            break;
        case '9':
            option.text = 'Yuan Chino';
            break;
        case '10':
            option.text = 'Rupia India';
            break;
        case '11':
            option.text = 'Real Brasileño';
            break;
        case '12':
            option.text = 'Peso Mexicano';
            break;
        case '13':
            option.text = 'Won Surcoreano';
            break;
        case '14':
            option.text = 'Rublo Ruso';
            break;
        case '15':
            option.text = 'Lira Turca';
            break;
        case '16':
            option.text = 'Rand Sudafricano';
            break;
        case '17':
            option.text = 'Dólar Neozelandés';
            break;
        case '18':
            option.text = 'Dólar de Singapur';
            break;
        case '19':
            option.text = 'Dólar de Hong Kong';
            break;
        case '20':
            option.text = 'Corona Sueca';
            break;
        case '21':
            option.text = 'Corona Noruega';
            break;
        case '22':
            option.text = 'Corona Danesa';
            break;
        case '23':
            option.text = 'Zloty Polaco';
            break;
        case '24':
            option.text = 'Forint Húngaro';
            break;
        case '25':
            option.text = 'Corona Checa';
            break;
        case '26':
            option.text = 'Nuevo Shekel Israelí';
            break;
        case '27':
            option.text = 'Baht Tailandés';
            break;
        case '28':
            option.text = 'Rupia Indonesia';
            break;
        case '29':
            option.text = 'Peso Filipino';
            break;
        case '30':
            option.text = 'Ringgit Malayo';
            break;
        case '31':
            option.text = 'Pesos Colombianos';
            break;
        case '32':
            option.text = 'Dinero Indio';
            break;
        case '47':
            option.text = 'DogeCoin';
            break;
        case '48':
            option.text = 'Bitcoin';
            break;
        case '49':
            option.text = 'Ethereum';
            break;
        case '51':
            option.text = 'Franco CFA';
            break;
        default:
            option.text = '';
            break;
    }
}


    // Función para actualizar el texto de la opción seleccionada de cuenta_1
    function actualizarTextoCuenta1() {
        var select = document.getElementById('cuenta_1');
        var option = select.options[select.selectedIndex];
        option.text = option.value === '{{$infoId->cuenta_1}}' ? '{{$infoId->cuenta_1}}' : option.textContent;
    }

    // Función para actualizar el texto de la opción seleccionada de cuenta_2
    function actualizarTextoCuenta2() {
        var select = document.getElementById('cuenta_2');
        var option = select.options[select.selectedIndex];
        option.text = option.value === '{{$infoId->cuenta_2}}' ? '{{$infoId->cuenta_2}}' : option.textContent;
    }

    // Llamar a las funciones para actualizar el texto al cargar la página
    actualizarTextoCuenta1();
    actualizarTextoCuenta2();
// Llamar a la función para actualizar el texto al cargar la página
actualizarTextoMoneda();

    // Llamar a la función para actualizar el texto al cargar la página
actualizarTexto();

</script>
    
@endsection