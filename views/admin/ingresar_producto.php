
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-1 mx-5">

      <div class="row">
          <div class="col-6">
          <a class="btn btn-dark" href="?controller=admin&method=inventario">Regresar</a>
        </div>
      </div>
        
      <div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-6 mt-5"><h4>¡Ingreso de productos!</h4></div>
    <div class="col-1"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=admin&method=insert_product" method="post" class="card col-10">

      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-1">Producto:</div>
        <select name="producto_id" id="" class="form-control col-10">
          <option disabled selected>Selecciona aquí tu producto</option>
          <?php foreach(parent::productos_c() as $producto): ?>
          <option value="<?=$producto->idprod?>"><?=$producto->Nombproduc?> - <?=$producto->Talla?></option>
          <?php endforeach; ?>
        </select>   
    </div>
      </div>    
       <div class="row">
        <div class="col-2 mx-5 my-1">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Cantidad:</div>
        <input type="text" placeholder="number product" class="form-control col-10" name="total">
        </div>
      </div>
      <input type="hidden" name="usuario_id" value="<?=$_SESSION['user']->id?>">
      <div class="d-flex justify-content-center mb-3">
      <button class="btn btn-outline-dark mx-2" type="submit">Ingresar</button>
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
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- /.content-wrapper -->

  <script>
  var precio1 = document.getElementById('precio1');
  var precio2 = document.getElementById('precio2');
  var iva = document.getElementById('iva');

  precio2.addEventListener('keyup', function(e){
   if(precio1.value!=""){
       if(iva.value!=""){
        var parcial=(precio1.value*iva.value)/100;
        precio2.value = parseInt(precio1.value) + parseInt(parcial);
       }else if(iva.value==""){
        precio2.value=precio1.value;
       }
   }
  });
  </script>