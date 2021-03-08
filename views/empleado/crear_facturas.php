<?php 
$fecha_de_hoy = date('Y/m/d');
$year = date('Y'); $day = date('d'); $month = date('m');
if(!isset($fact->id_factura)){
$suma = 0+1;
}else{
    $suma = $fact->id_factura;
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-1 mx-5">

      <div class="row">
          <div class="col-6">
          <a class="btn btn-dark" href="?controller=empleado&method=facturas">Regresar</a>
        </div>
      </div>
        
      <div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-4 mt-5"><h4>¡Generar venta!</h4></div>
    <div class="col-4"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=empleado&method=registrar_factura" method="post" class="card col-10">
     <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-start align-items-center">
        <div class="ml-3">Código de factura: <b>IEA<?=$year?><?=$month?><?=$day?><?=$suma?></b></div>
        <input type="hidden" placeholder="names lastnames" class="form-control col-10" name="codigo_factura" value="IEA<?=$year?><?=$month?><?=$day?><?=$suma?>">
        <input type="hidden" placeholder="names lastnames" class="form-control col-10" name="factura" value="IEA<?=$year?><?=$month?><?=$day?><?=$suma?>">
        </div>
      </div>
      <input type="hidden" name="usuario_id" value="<?=$_SESSION['user']->id?>">
      <input type="hidden" name="fecha_factura" value="<?=$fecha_de_hoy?>">
    
     <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Cliente:</div>
        <select name="cliente_id" id="" class="form-control col-10">
        <option selected disabled>Seleccione aquí el cliente</option>
        <?php  foreach(parent::personas() as $persona):?>
        <option value="<?=$persona->id_persona?>"><?=$persona->PersoNombres?></option>
        <?php endforeach; ?>
       </select> 
       </div>
      </div>
     <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Producto:</div>
        <select id="producto_seleccionar" class="form-control col-10">
        <option selected disabled>Seleccione aquí el producto</option>
        <?php  foreach(parent::productos_factura() as $producto):?>
        <option value="<?=$producto->idprod?>" ><?=$producto->Nombproduc?> - <?=$producto->Talla?> - $<?=$producto->PrecVentProduc?></option>
        <?php endforeach; ?>
       </select> 
       <br>
       </div>
      </div>
      <input type="hidden" id="cantidad_bd">
      <input type="hidden" id="total_bd">
      <input type="hidden" name="productos" id="productos_almacenar">
      <input type="hidden" name="productos_esp" id="productos_esp">
       <div class="row d-flex justify-content-center">
        <div class="col-2 mx-5 ml-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mr-2">Cantidad:</div>
        <input type="text" placeholder="0" id="cantidad_factura" class="form-control col-10">
        <a id="boton_agregar" class="btn btn-white ml-2"><i class="material-icons text-dark">add_box</i></a>
       <a id="limpiar_formulario" class="btn btn-white ml-2"><i class="material-icons text-dark">restore</i></a>
       </div>
      </div>
       <div id="mensaje1"></div>
       <div id="mensaje"></div>
      <center>
      <table class="table table-bordered">
      <thead>
      <tr>
      <th>
      Producto
      </th>
      <th>
      Valor unitario
      </th>
      <th>
      Cantidad
      </th>
      <th>
      Valor total
      </th>
      <th>
      Suprimir
      </th>
      </tr>
      </thead>
      <tbody id="productos_seleccionados">
      </tbody>
      </table> 
      </center> 
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Subtotal:</div>
        <input name="subtotal" id="subtotal_formulario" class="form-control col-10">
       </div>
      </div> 
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-4">Iva:</div>
        <input name="iva" id="iva_formulario" class="form-control col-10 ml-1">
       </div>
      </div> 
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Total:</div>
        <input name="total" id="total_formulario" class="form-control col-10">
       </div>
      </div> 
      <div class="d-flex justify-content-center mb-3">
      <button class="btn btn-outline-dark mx-2" type="submit">Crear</button>
      </div>
      </div>
     </form>
     </center>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>
  </div>
  <br><br><br><br><br><br><br><br><br>
  <br>
  <!-- /.content-wrapper -->

  <script>
  var api1 = <?php $api1 = new empleado(); 
  $api1->getApiproductos(); ?>;
  console.log(api1.productos);
  var subtotal_formulario = document.getElementById('subtotal_formulario');
  var iva_formulario = document.getElementById('iva_formulario');
  var productos_esp = document.getElementById('productos_esp');
  var total_formulario = document.getElementById('total_formulario');
  var limpiar_formulario = document.getElementById('limpiar_formulario');
  var cantidad_bd = document.getElementById('cantidad_bd');
  var total_bd = document.getElementById('total_bd');
  var cantidad_factura = document.getElementById('cantidad_factura');
  var mensaje1 = document.getElementById('mensaje1');
  var mensaje = document.getElementById('mensaje');
  var boton_agregar = document.getElementById('boton_agregar');
  var producto_seleccionar = document.getElementById('producto_seleccionar');
  var productos_seleccionados = document.getElementById('productos_seleccionados');
  var productos = [];
  var total_parcial;
  var nombre;
  var valor_unitario;
  var global;
  var productos_continuar  = [];
  var productos_almacenar  = document.getElementById('productos_almacenar');

  boton_agregar.addEventListener('click', function(e){
    e.preventDefault();
    //agregar cantidad total del producto
    for(let i = 0; i < api1.productos.length; i++){
      if(api1.productos[i].idprod == producto_seleccionar.value){
        mensaje1.innerHTML = 'Cantidad disponible en Base de Datos: ' + api1.productos[i].total;
        cantidad_bd.value = api1.productos[i].total;
        total_bd.value = api1.productos[i].PrecVentProduc;
        nombre = api1.productos[i].Nombproduc;
        valor_unitario = api1.productos[i].PrecVentProduc;
      }
    }
    mensaje.innerHTML = "";
    var verify = productos.indexOf(producto_seleccionar.value);
    if(producto_seleccionar.value>0){
     if(productos.length == 0){
         if(cantidad_factura.value == "" || cantidad_factura == 0){
          mensaje.innerHTML = "<div class='alert alert-danger' role='alert'>¡¡Debe elegir una cantidad!!</div>";
         }else{
          if(parseInt(cantidad_factura.value)>parseInt(cantidad_bd.value)){
           return mensaje.innerHTML = "<div class='alert alert-danger' role='alert'>¡¡Debes seleccionar una cantidad menor!!</div>";
          }else if(parseInt(cantidad_factura.value)<parseInt(cantidad_bd.value)){
            total_parcial = total_bd.value*cantidad_factura.value;
            productos.push(producto_seleccionar.value);
            productos_continuar.push({
              idprod: producto_seleccionar.value,
              cantidad: cantidad_factura.value,
              precio: total_parcial,
              nombre: nombre,
              valor_unitario: valor_unitario
            });
            mensaje.innerHTML = "";
            cantidad_factura.value = "";
            mensaje1.innerHTML = "";
            producto_seleccionar.value = "Seleccione aquí el producto";
          }else{}
         }
     }else if(productos.length != 0){
        if(verify == -1){
          
         if(cantidad_factura.value == "" || cantidad_factura == 0){
          mensaje.innerHTML = "<div class='alert alert-danger' role='alert'>¡¡Debe elegir una cantidad!!</div>";
         }else{
          if(parseInt(cantidad_factura.value)>parseInt(cantidad_bd.value)){
         return mensaje.innerHTML = "<div class='alert alert-danger' role='alert'>¡¡Debes seleccionar una cantidad menor!!</div>";
          }else if(parseInt(cantidad_factura.value)<parseInt(cantidad_bd.value)){
            total_parcial = parseInt(total_bd.value)*parseInt(cantidad_factura.value);
            productos.push(producto_seleccionar.value);
            productos_continuar.push({
              idprod: producto_seleccionar.value,
              cantidad: cantidad_factura.value,
              precio: total_parcial,
              nombre: nombre,
              valor_unitario: valor_unitario
            });
            mensaje.innerHTML = "";
            cantidad_factura.value = "";
            mensaje1.innerHTML = "";
            producto_seleccionar.value = "Seleccione aquí el producto";
          }else{}
         }
      }else{
          mensaje.innerHTML = "<div class='alert alert-danger' role='alert'>¡¡El producto ya está agregado!!</div>";
        }
       }
    }else{
     mensaje.innerHTML = "<div class='alert alert-danger' role='alert'>¡¡Debes seleccionar un producto!!</div>";
    }
    productos_almacenar.value = JSON.stringify(productos_continuar);
    productos_esp.value = JSON.stringify(productos);
    mostrar_productos();
  });


  //Función para limpiar formulario
  limpiar_formulario.addEventListener('click', function(e){
   e.preventDefault();
   mensaje1.innerHTML = "";
   mensaje.innerHTML = "";
   cantidad_factura.value = "";
   producto_seleccionar.value = "Seleccione aquí el producto";
  });

  const mostrar_productos = () => {
    subtotal_formulario.value = 0;
    productos_seleccionados.innerHTML = "";
    if(productos_seleccionados.length == 0){
   productos_seleccionados.innerHTML="";
  }else{
    productos_continuar.forEach(element=>{
      subtotal_formulario.value = parseInt(element.precio)+parseInt(subtotal_formulario.value); 
      productos_seleccionados.innerHTML += `<tr><td>${element.nombre}</td><td>${element.valor_unitario}</td><td>${element.cantidad}</td><td>${element.precio}</td><td><button class="btn btn-white" onclick="eliminar('${element.idprod}');"><i class="material-icons text-dark">delete</i></button></td></tr>`;
    });
  }
}

total_formulario.addEventListener('keyup', function(e){
  if(iva_formulario.value == "" || iva_formulario.value == 0){
    total_formulario.value = subtotal_formulario.value;
  }else{
    var operacion = (subtotal_formulario.value*iva_formulario.value)/100
    total_formulario.value = parseInt(subtotal_formulario.value)+parseInt(operacion);
  }
});


const eliminar = (ret) =>{
  let variable = String(ret);
  var verificar = productos.indexOf(ret);
  productos.splice(verificar, 1);
  for(let x=0; x<productos_continuar.length; x++){
    if(productos_continuar[x].idprod == variable){
     productos_continuar.splice(x,1);
     mostrar_productos();
    }
  }
}
  </script>